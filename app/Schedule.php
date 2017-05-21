<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable=[
        'id',
        'title',
        'start_date',
        'staff',
        'staff_name',
        'notify_email',
        'email_to_notif',
        'notify_sms',
        'sms_to_notif',
        'is_confirmed'
    ];

    public static function countMyScheds($staff_id){
        $scheds = Schedule::all();

        $scheds2 = array();
        $schedIDs = array();
        $i = 0; $schedCount = 0;
        foreach($scheds as $sch){
            $scheds2[$i] = str_getcsv($sch->staff, ','); // parse every ID of a schedule
            foreach($scheds2[$i] as $s){ // foreach ID in that specific schedule,
                if($s == $staff_id && $sch->is_confirmed == 0){ // check if it contains the ID of the viewer
                    $schedCount++; // if so, increment count
                    break;
                }
            }
            $i++;
        }
        return $schedCount;
    }
}
