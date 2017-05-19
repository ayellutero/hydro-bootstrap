<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class StatController extends Controller
{
    public function retSenStat($id){                
        $statsData = $this->senStat($id);
        return view('Stations.station_stats')
            ->with('statsData', (json_encode($statsData)))
            ->with('dev_id', $id);
    }

    public function senStat($id){ // For specific stations/sensors
        $commDefect = Report::select('work_done')
                    ->where('station_id', $id)
                    ->where('if_approved', 1)
                    ->get();

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

        $cdArray = array();
        $stats = array();
        foreach($cdData as $key => $value){
            $stats['label'] = $key;
            $stats['data'] = $value;

            array_push($cdArray, $stats);
        }
    
        $partReps = Report::select('part_installed')
                    ->where('station_id', $id)
                    ->where('if_approved', 1)
                    ->get();
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

        return $statsData;
    }
}
