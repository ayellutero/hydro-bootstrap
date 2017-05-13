<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Report;
use App\Notification;
use App\UserActivity;
use App\User;
use App\Station;
use App\StationReport;

class ReportController extends Controller
{
    public function index()
    {
      $reports=Report::all();
      return view('Reports.view_report',compact('reports'));
    }

    public function store()
    {
        $report=Request::all();
        $loc = Station::where('location', $report['station_name'])->first();
        $report['location'] = $loc->location.', '.$loc->province;
        echo $report['location'];
        $users = User::all();
        $count = 0;
        foreach($users as $user){
            if($user->roles()->find(3)){ // get admins
                $admins[$count] = $user->roles()->find(3);
                $count++;
            }
            if($user->roles()->find(2)){ // get unit heads
                $heads[$count] = $user->roles()->find(2);
                $count++;
            }
        }

        $count = 0;
        foreach($admins as $admin){ // add admins to array adminHead
            $adminHead[$count] = $admin;
            $count++;        
        }

        foreach($heads as $head){ // add unit heads to array adminHead
            $adminHead[$count] = $head;
            $count++;        
        }

        foreach($adminHead as $ah){
          // Send notifications to all admins and unit heads
          // about new report

            $usr = User::where('id', $ah->pivot['user_id'])->get();
            $report['receiver_id'] = $usr[0]->employee_id;

          if(strcmp($report['sender_id'], $report['receiver_id'])!=0){
            // echo $report['sender_id'].'-'.$report['receiver_id'].' ';
            // Notification::create($report);
          }
          
        }
        
        if($report['part_replaced'] == null)
            $report['part_replaced'] = "None";

        $station_id = Station::select('device_id')->where('location', $report['station_name'])->get()->first();
        $report['station_id'] = $station_id['device_id'];
        // // echo  $report['station_id'];

        

        Report::create($report);
        $stationData['device_id'] = $report['station_id'];

        $rep = Report::where('created_at', \Carbon\Carbon::now())->get()->first();
        $stationData['report_id'] = $rep->id;
        // StationReport::create($stationData);
        
        // UserActivity::create($report);

        return redirect('addMaintenanceReport')
                ->with('message', 'SUCCESS! Your report has been submitted for confirmation.');
    }

    public function update($id){
      $reportUpdate = Request::all();
      $report = Report::find($id);
      $report->update($reportUpdate);
      // UserActivity::create($reportUpdate);

      $message = 'SUCCESS! You approved a report by '.$reportUpdate['noted_by'].'.';

      if($report->if_approved == 1){
        if(strcmp($reportUpdate['sender_id'], $reportUpdate['receiver_id'])!=0)
        // Check if report is approved by its author,
        { // If not, create notification for the user,
          // Notification::create($reportUpdate);
          $message = 'SUCCESS! Report has been approved.';
        } // else, there's no need to notify
    
        return redirect('viewPendingReports')
               ->with('message', $message);
      }
      else{
        // Notification::create($reportUpdate);
        return redirect('viewMyMaintenanceReports')
               ->with('message', 'SUCCESS! Your report has been edited.');
      }
    }

    public function approve($id){
      $reportUpdate = Request::all();
      $report = Report::find($id);
      $report->update($reportUpdate);
      

      return redirect('notifications');//->with('message', 'EDIT');
    
    }

    public function display_report(){
      $reports = DB::table('reports')->get();

    }

    public function show_pending(){
      return view('Notifications.pending_reports');
    }
    
}
