<?php

use App\Schedule;

try {

    $cals = Schedule::all();

    // Returning array
    $events = array();
    $calEvents = array();

    // Fetch results
    foreach($cals as $cal) {

        $calEvents['id'] = $cal->id;
        $calEvents['title'] = $cal->title;
        $calEvents['start'] = $cal->start_date;
        $calEvents['allDay'] = false;
        $calEvents['staff'] = $cal->staff;
        $calEvents['is_confirmed'] = $cal->is_confirmed;
        $calEvents['email'] = $cal->email_to_notif;


        // Merge the event array into the return array
        array_push($events, $calEvents);

    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}
