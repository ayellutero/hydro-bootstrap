<?php

use App\Report;

try {

    $partReps = Report::select('part_replaced')->where('if_approved', 1)->get();
    $prData = array();
    foreach($partReps as $part){
        $prData[$part->part_replaced] = 0;
    }

    foreach($partReps as $part){
        $prData[$part->part_replaced] += 1;        
    }

    $keyCount = count($partReps);
    $statsData = array();

    foreach($prData as $key => $value){
        // $stats[$key] = $value/$keyCount;
        $stats['label'] = $key;
        $stats['data'] = $value;

         array_push($statsData, $stats);
    }

    // Output json for our calendar
    echo json_encode($statsData);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}
