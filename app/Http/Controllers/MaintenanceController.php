<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;
use App\Report;

use App\StationReport;
class MaintenanceController extends Controller
{
    //
    public function addRepView(){
        $stations = Station::orderBy('location')->get();

        return view('/Reports/add_report')->with('stations', $stations);
    }

    public function allRepsView(){
        return view('/Reports/view_report');
    }

    public function myRepsView(){
        return view('/Reports/my_reports');
    }

    public function stationsView(){
        $stations = Station::orderBy('location')->get();
        return view('Stations.index')->with('stations', $stations);
    }

    public function viewStationHistory($id){
        return view('Stations.station_reports')->with('reports', Report::where('station_id', $id)->get());
    }

    
}
