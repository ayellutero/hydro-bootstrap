<?php

namespace App\Http\Controllers;

use App\Schedule; 
use App\User;
use App\Station;
use Request;
use Carbon\Carbon; 
use App\Notifications\UpcomingMaintenance;
use Borla\Chikka\Chikka;

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

        // Get user chosen in the by the employee_id
        $staff = User::where('employee_id',  $schedule['staff'])->get();
    
        // Automatically set the email_to_notif to the chosen user's email
        $schedule['email_to_notif'] =  $staff[0]->email;

        if(Request::has('notify_sms'))  // If notify via SMS is checked,
            if($schedule['notify_sms'] == 1) 
                // Automatically set the email_to_notif to the chosen user's email
                $schedule['sms_to_notif'] =  $staff[0]->contact_num;

        Schedule::create($schedule);
        $sch = Schedule::where('created_at', \Carbon\Carbon::now())->get()->first(); // get the newly created sched
        // static::notifyUser($staff[0]->id, $schedule['start_date'], $schedule['title'], $sch->id);   

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

    public function update($id){

    }

    public function notifyUser($id, $date, $title, $notif_id){
        $user = User::findOrFail($id);
        $user->notify(new UpcomingMaintenance($user, $date, $title, $notif_id));

        // Notify via SMS code here
        
    }

    public function confirmSched($id){

        if(Schedule::find($id)){
            $sched = Schedule::find($id);
            $checkSched = Schedule::where('id', $id)->first();
            if($checkSched->is_confirmed == 0){
                $confirm['is_confirmed'] = 1;
                $sched->update($confirm);
                return view('Calendar.success');
            }
            
        }
        return view('Calendar.failed');

        
        //create User Activity

        
    }

    public function smp(){
        $r = Request::all();
        $r = $r['smpl'];

        foreach($r as $rr){
            echo $rr." ";
        }
        // print_r($r['smpl']);
    }
}
