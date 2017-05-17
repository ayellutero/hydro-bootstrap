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

        'monitoring_date',
        'init_findings',
        'rec_work',
        'last_data',
        'assessed_by',

        'onsite_date',
        'actual_findings',
        'work_done',
        'part_installed',
        'status',
        'conducted_by',
         
         'supervisor',
         'designation',

         'if_approved',
         'date_approved',
         'submitted_by'
    ];
}
