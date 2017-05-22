<?php

namespace App\Http\Controllers;

use App\Schedule; 
use App\User;
use App\Station;
use Request;
use Carbon\Carbon; 
use App\Notifications\UpcomingMaintenance;
use App\UserActivity;

class CalendarController extends Controller
{
    public function index(){
        $events = Schedule::all();
        $users = User::orderBy('lastname')->get();
        $stations = Station::orderBy('location')
                    ->get();
        
        return view('Calendar.index', compact('calendar'))
                    ->with('events', $events)
                    ->with('stations', $stations)
                    ->with('users', $users);
    }

    public function store(){
        $schedule=Request::all();

        $staffNames = array();
        $staffIDs = array();
        $str = '';
        $str2 = '';
        $str3 = '';
        foreach($schedule['staff'] as $arr){
            $s = User::where('employee_id',  $arr)->first();
            $str = $s->firstname.' '.$s->lastname.', '.$str;
            $str2 = $s->employee_id.','.$str2;
            $str3 = $s->email.','.$str3;
        }

         $sNames = rtrim($str,', '); // remove trailing comma and space
         $sIDs = rtrim($str2, ',');
         $sEmails = rtrim($str3, ',');

        // user/s chosen the by the Admin
        $schedule['staff'] = $sIDs;
        $schedule['staff_name'] = $sNames;
    
        // Automatically set the email_to_notif to the chosen user's email
        $schedule['email_to_notif'] =  $sEmails;

        Schedule::create($schedule);
        $sch = Schedule::where('created_at', \Carbon\Carbon::now())->get()->first(); // get the newly created sched

        // For email notifications
        $usrs = str_getcsv($sIDs, ',');
        foreach($usrs as $u){
            static::notifyUser($u, $schedule['start_date'], $schedule['title'], $sch->id);   
            print_r($sch->id);
        }
        
        UserActivity::create($schedule);

        return redirect('calendar')->with('message', 'Successfully scheduled a maintenance!');
    }

    public function destroy($id){
       // Since changes are not real-time, this function double checks 
       // discrepancies in data

       if(Request::has('eventIDinput')){ // if request contains the event ID
            $sched = Request::all();
            $sched = Schedule::where('id', $sched['eventIDinput'])->first();

            if(Schedule::find($sched->id) != null){ // if event is found in the database
                if($sched->is_confirmed == 1){ // If event has already been confirmed
                    return redirect()->back()
                            ->with('error', 'Confirmed maintenance schedules cannot be deleted!');
                }
                else{ // delete schedule
                    Schedule::find($sched->id)->delete();
                    $message = 'Schedule deleted successfully!';
                    return redirect()->back()
                            ->with('message', $message);
                }
            }
            else{ // if event is not found in the database
                return redirect()->back()
                        ->with('error', 'Cannot delete schedule!');
            }
       }else{ // if request doesn't contain the event ID
             return redirect()->back()
                        ->with('error', 'Schedule not found!');
        }

        UserActivity::create($request->all());
        
    }

    public function notifyUser($id, $date, $title, $notif_id){
        $user = User::where('employee_id', $id)->first();
        // Uncomment next line for email notifications (Internet connection required)
        // $user->notify(new UpcomingMaintenance($user, $date, $title, $notif_id));

        // Notify via SMS code here
    }

    public function confirmSched($array){ // via email
        $array = str_getcsv($array, ',');
        $id = $array[0];
        $userID = $array[1];


        if(Schedule::find($id)){
            $sched = Schedule::find($id);
            $checkSched = Schedule::where('id', $id)->first();
            if($checkSched->is_confirmed == 0){
                $confirm['is_confirmed'] = 1;
                $sched->update($confirm);

                // User Activity
                static::createConfirmActivity($userID);
                return view('Calendar.success');
            }
            
        }
        return view('Calendar.failed');
    }

    public function showUnconfirmed($staff_id){
        $scheds = Schedule::all();

        $scheds2 = array();
        $schedIDs = array();
        $i = 0;
        foreach($scheds as $sch){
            $scheds2[$i] = str_getcsv($sch->staff, ','); // parse every ID of a schedule
            foreach($scheds2[$i] as $s){ // foreach ID in that specific schedule,
                if($s == $staff_id){ // check if it contains the ID of the viewer
                    array_push($schedIDs, $sch->id); // if so, put it in array
                    break;
                }
            }
            $i++;
        }

        $myScheds = array();
        foreach($schedIDs as $sid){ // push all schedules for user into one array
            $id = Schedule::where('id', $sid)->get()->first();
            array_push($myScheds, $id);
        }

        return view('Calendar.unconfirmed')->with('scheds', $myScheds);
    }

    public function update($array){ // confirm via browser
        $array = str_getcsv($array, ',');
        $id = $array[0];
        $userID = $array[1];

        $staff = '';
        if(Schedule::find($id)){
            $sched = Schedule::find($id);
            $checkSched = Schedule::where('id', $id)->first();
            $staff= $checkSched->staff;
            if($checkSched->is_confirmed == 0){
                $confirm['is_confirmed'] = 1;
                $sched->update($confirm);

                // User Activity
                static::createConfirmActivity($userID);
                return redirect()->back()->with('success', 'SUCCESS! You have confirmed your schedule');
            }
        }
        return redirect()->back()->with('error', 'ERROR! The schedule has either been deleted or confirmed.');
          
    }

    static function createConfirmActivity($userID){
        $staff = User::select('firstname', 'lastname', 'designation', 'employee_id')->where('employee_id', $userID)->first();
        
        $act['empID'] = $staff['employee_id'];

        $act['employee_name'] = $staff['firstname'].' '.$staff['lastname'];
        $act['employee_position'] = $staff['designation'];
        $act['activity'] = 'Confirmed his/her scheduled maintenance.';

        $time = \Carbon\Carbon::now(new \DateTimeZone('Asia/Singapore'));
        $act['sent_at_date'] = $time->toDateString();
        $act['sent_at_time'] = $time->toTimeString();

        UserActivity::create($act);
    
    }

}
