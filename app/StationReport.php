<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StationReport extends Model
{
    protected $fillable=[
        'device_id',
        'report_id'
    ];
}
