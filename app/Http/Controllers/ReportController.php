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

        $station_id = Station::select('device_id', 'type')->where('location', $report['station_name'])->get()->first();
        $report['station_id'] = $station_id['device_id'];
        $report['sensor_type'] = $station_id['type'];

        $report['conducted_by'] = static::parseInputArray($report['conducted_by']);
        $report['assessed_by'] = static::parseInputArray($report['assessed_by']);
        $report['part_installed'] = static::parseInputArray($report['part_installed']);
        $report['work_done'] = static::parseInputArray($report['work_done']);

        $supervisor = User::select('designation', 'firstname', 'lastname')
                      ->where('employee_id', $report['supervisor'])->get()->first();

        $report['designation'] = $supervisor['designation'];
        $report['supervisor'] = $supervisor['firstname'].' '.$supervisor['lastname'];
        // Report::create($report);
        UserActivity::create($report);

        return redirect('addMaintenanceReport')
                ->with('message', 'SUCCESS! Your report has been submitted for confirmation.');
    }


    static function parseInputArray($array){
      $str = '';
        foreach($array as $arr){
            $str = $arr.', '.$str;
        }

        $newStr = rtrim($str,', '); // remove trailing comma and space

      return $newStr;
    }
    public function update($id){
      $reportUpdate = Request::all();
      $report = Report::find($id);

      // $reportUpdate['conducted_by'] = static::parseInputArray($reportUpdate['conducted_by']);
      // $reportUpdate['assessed_by'] = static::parseInputArray($reportUpdate['assessed_by']);
      // $reportUpdate['part_installed'] = static::parseInputArray($reportUpdate['part_installed']);
      // $reportUpdate['work_done'] = static::parseInputArray($reportUpdate['work_done']);

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
