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
        // this is the STATISTICS controller for the Dashboard stats
        $locations = Station::all();
        $commDefect = Report::select('work_done')->where('if_approved', 1)->get();
        $cdData = array();
        foreach($commDefect as $def){
            if($def->work_done != NULL){
                $workArray = str_getcsv($def->work_done, ',');
                foreach($workArray as $wd)
                    $cdData[$wd] = 0;
            }
        }

        foreach($commDefect as $def){
            if($def->work_done != NULL){
                $workArray = str_getcsv($def->work_done, ',');
                foreach($workArray as $wd)
                    $cdData[$wd] += 1;
            }        
        }

        $partReps = Report::select('part_installed')->where('if_approved', 1)->get();
        $prData = array();
        foreach($partReps as $part){
            if($part->part_installed != NULL){
                $partArray = str_getcsv($part->part_installed, ',');
                foreach($partArray as $pr)
                    $prData[$pr] = 0;
            }
        }

        foreach($partReps as $part){
            if($part->part_installed != NULL){
                $partArray = str_getcsv($part->part_installed, ',');
                foreach($partArray as $pr)
                    $prData[$pr] += 1;
            }      
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
        print_r(json_encode($statsData));
        return view('index',compact('locations'))->with('statsData', (json_encode($statsData)));
        
    }

    public function store(){
        echo Report::select('employee_id','conducted_by');
    }

    public function retStat(){
        return view('statData');
    }
}
