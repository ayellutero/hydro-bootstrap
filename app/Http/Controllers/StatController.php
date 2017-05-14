<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class StatController extends Controller
{
    // public function index()
    // {
    //      $statsData = $this->genStat();
    //      return view('index')->with('statsData', (json_encode($statsData)));
    // }

    public function retSenStat($id){                
        $statsData = $this->senStat($id);
        return view('Stations.station_stats')
            ->with('statsData', (json_encode($statsData)))
            ->with('dev_id', $id);
    }

    // public static function genStat(){
    //     $commDefect = Report::select('actual_defects')->where('if_approved', 1)->get();
    //     $cdData = array();
    //     foreach($commDefect as $def){
    //         $cdData[$def->actual_defects] = 0;
    //     }

    //     foreach($commDefect as $def){
    //         $cdData[$def->actual_defects] += 1;        
    //     }

    //     // $keyCount = count($partReps);
    //     $cdArray = array();
    //     $stats = array();
    //     foreach($cdData as $key => $value){
    //         $stats['label'] = $key;
    //         $stats['data'] = $value;

    //         array_push($cdArray, $stats);
    //     }
    //     // ......... //
    //     $partReps = Report::select('part_replaced')->where('if_approved', 1)->get();
    //     $prData = array();
    //     foreach($partReps as $part){
    //         $prData[$part->part_replaced] = 0;
    //     }

    //     foreach($partReps as $part){
    //         $prData[$part->part_replaced] += 1;        
    //     }

   
    //     $prArray= array();
    //     $stats = array();
    //     foreach($prData as $key => $value){
    //         $stats['label'] = $key;
    //         $stats['data'] = $value;

    //         array_push($prArray, $stats);
    //     }
    //     $statsData = [ $prArray, $cdArray ];

    //     return $statsData;
    // }

    public function senStat($id){
        $commDefect = Report::select('actual_defects')
                    ->where('station_id', $id)
                    ->where('if_approved', 1)
                    ->get();

        $cdData = array();
        foreach($commDefect as $def){
            $cdData[$def->actual_defects] = 0;
        }

        foreach($commDefect as $def){
            $cdData[$def->actual_defects] += 1;        
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
        $partReps = Report::select('part_replaced')
                    ->where('station_id', $id)
                    ->where('if_approved', 1)
                    ->get();
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

        return $statsData;
    }
}
