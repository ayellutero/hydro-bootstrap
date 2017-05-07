<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class StatController extends Controller
{
    public function index()
    {
        $commDefect = Report::select('actual_defects')->where('if_approved', 1)->get();
        $cdData = array();
        foreach($commDefect as $def){
            $cdData[strtolower($def->actual_defects)] = 0;
        }

        foreach($commDefect as $def){
            $cdData[strtolower($def->actual_defects)] += 1;        
        }

        // $keyCount = count($partReps);
        $cdArray = array();
        $stats = array();
        foreach($cdData as $key => $value){
            $stats['label'] = $key;
            $stats['data'] = $value;

            array_push($cdArray, $stats);
        }
        // ......... //
        $partReps = Report::select('part_replaced')->where('if_approved', 1)->get();
        $prData = array();
        foreach($partReps as $part){
            $prData[strtolower($part->part_replaced)] = 0;
        }

        foreach($partReps as $part){
            $prData[strtolower($part->part_replaced)] += 1;        
        }

        // $keyCount = count($partReps);
        $prArray= array();
        $stats = array();
        foreach($prData as $key => $value){
            $stats['label'] = $key;
            $stats['data'] = $value;

            array_push($prArray, $stats);
        }
        $statsData = [ $prArray, $cdArray ];
         return view('Statistics.index')->with('statsData', (json_encode($statsData)));
    }

    public function store(){
        echo Report::select('employee_id','conducted_by');

        // return view('Statistics.index')->with('');
    }

    public function retStat(){
        return view('Statistics.statData');
    }
}
