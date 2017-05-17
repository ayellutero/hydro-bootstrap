<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Report;
use App\UserActivity;
use App\User;
use App\Station;
use App\StationReport;
use App\Part;

class ReportController extends Controller
{
    public function index()
    {
      $reports=Report::all();
      return view('Reports.view_report',compact('reports'))->with('parts', $parts);
    }

    public function store()
    {
        $report=Request::all();
        $loc = Station::where('location', $report['station_name'])->first();
        $report['location'] = $loc->location.', '.$loc->province;
        
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
        
        UserActivity::create($report);

        return redirect('addMaintenanceReport')
                ->with('message', 'SUCCESS! Your report has been submitted for confirmation.');
    }

    public function update($id){
      $reportUpdate = Request::all();
      $report = Report::find($id);
      $report->update($reportUpdate);
      UserActivity::create($reportUpdate);

      $message = 'SUCCESS! You approved a report by '.$reportUpdate['noted_by'].'.';

      if($report->if_approved == 1){
          $message = 'SUCCESS! Report has been approved.';
    
        return redirect('viewPendingReports')
               ->with('message', $message);
      }
      else{
        return redirect('viewMyMaintenanceReports')
               ->with('message', 'SUCCESS! Your report has been edited.');
      }
    }

    // public function approve($id){
    //   $reportUpdate = Request::all();
    //   $report = Report::find($id);
    //   $report->update($reportUpdate);
      

    //   return redirect('viewPendingReports');//->with('message', 'EDIT');
    
    // }

    public function display_report(){
      $reports = DB::table('reports')->get();

    }

    public function show_pending(){
      return view('Notifications.pending_reports');
    }
    
}
