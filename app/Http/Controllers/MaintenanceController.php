<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;
use App\Report;
use App\User;
use App\Part;
use App\Work;

use App\StationReport;
class MaintenanceController extends Controller
{
    //
    public function addRepView(){
        $stations = Station::orderBy('location')->get();
        $parts=Part::all();
        $users=User::all();
        $works=Work::all();
        return view('/Reports.index')
                    ->with('users', $users)
                    ->with('works', $works)
                    ->with('parts', $parts)
                    ->with('stations', $stations);
    }

    public function allRepsView(){
        return view('/Reports/view_report');
    }

    public function myRepsView(){
        $parts=Part::all();
        $users=User::all();
        $works=Work::all();
        return view('/Reports/my_reports')
                    ->with('users', $users)
                    ->with('works', $works)
                    ->with('parts', $parts);
    }

    public function stationsView(){
        $stations = Station::orderBy('location')->get();
        return view('Stations.index')->with('stations', $stations);
    }

    public function viewStationHistory($id){
        return view('Stations.station_reports')->with('reports', Report::where('station_id', $id)->get());
    }

    
}
