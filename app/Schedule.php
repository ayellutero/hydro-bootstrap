<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable=[
        'sched_id',
        'title',
        'date',
        'staff',
        'notify_email',
        'notify_sms'
    ];
}
