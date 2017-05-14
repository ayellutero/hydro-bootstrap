<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Station;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // this is the STATISTICS controller
        $locations = Station::all();
        $commDefect = Report::select('actual_defects')->where('if_approved', 1)->get();
        $cdData = array();
        foreach($commDefect as $def){
            $cdData[$def->actual_defects] = 0;
        }

        foreach($commDefect as $def){
            $cdData[$def->actual_defects] += 1;        
        }

        // ......... //
        $partReps = Report::select('part_replaced')->where('if_approved', 1)->get();
        $prData = array();
        foreach($partReps as $part){
            $prData[$part->part_replaced] = 0;
        }

        foreach($partReps as $part){
            $prData[$part->part_replaced] += 1;        
        }
        
        $parts_arr = array();
        $defects_arr = array();
        $cnt = 0;
        foreach($prData as $key => $value){
           $parts_arr[$cnt] = [$key, $value];
           $cnt++;
        }

        $cnt = 0;
        foreach($cdData as $key => $value){
           $defects_arr[$cnt] = [$key, $value];
           $cnt++;
        }

        $statsData = [ $parts_arr, $defects_arr ];
        return view('index',compact('locations'))->with('statsData', (json_encode($statsData)));
        
    }

    public function store(){
        echo Report::select('employee_id','conducted_by');
    }

    public function retStat(){
        return view('statData');
    }
}
