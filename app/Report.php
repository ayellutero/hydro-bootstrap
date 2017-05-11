<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function stationReports()
    {
        return $this->belongsToMany('App\Station', 'station_reports', 'device_id', 'report_id'); // many-to-many user_role correspondence
                                                                                    // foreign key: device_id, report_id
    }

    // public function hasRole($role) // check if a user has a role
    // {
    //     if ($this->roles()->where('name', $role)->first()) {
    //         return true;
    //     }
    //     return false;
    // }


    protected $fillable=[
    'emp_id',
    'station_id',
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
    'if_approved',
    'date_approved'
    ];
}
