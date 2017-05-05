<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;

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
}
