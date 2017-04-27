<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    //
    public function addRepView(){
        return view('/Reports/add_report');
    }

    public function allRepsView(){
        return view('/Reports/view_report');
    }

    public function myRepsView(){
        return view('/Reports/my_reports');
    }
}
