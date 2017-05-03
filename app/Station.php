<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable=[
        'device_id',
        'province',
        'location',
        'lat',
        'lng',
        'type',
    ];
}