<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable=[
    'emp_id',
    'station_name',
    'location',
    'sensor_type',
    'date_assessed',
    'problem',
    'work_tdone',
    'last_data',
    'init_remarks',
    'date_visited',
    'actual_defects',
    'work_done',
    'part_replaced',
    'tp_results',
    'rc_performed',
    'onsite_remarks',
    'conducted_by',
    'c_position',
    'noted_by',
    'n_position',
    'if_approved'
    ];
}
