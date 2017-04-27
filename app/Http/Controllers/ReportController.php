<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Report;
use App\Notification;
use App\UserActivity;

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
       Report::create($report);
       Notification::create($report);
       UserActivity::create($report);

       return redirect('success')->with('message', 'ADD');
    }

    public function update($id){
      $reportUpdate = Request::all();
      $report = Report::find($id);
      $report->update($reportUpdate);
      UserActivity::create($reportUpdate);

      if($report->if_approved == 1){
        return redirect('viewPendingReports');//->with('message', 'HELLO');
      }
      // return view('x.sample')->with('report', $report);
      else{
        Notification::create($reportUpdate);
        return redirect('success')->with('message', 'EDIT');
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
