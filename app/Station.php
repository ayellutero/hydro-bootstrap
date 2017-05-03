<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable=[
        'device_id',
        'location',
        'lat',
        'lng',
        'type',
    ];
}
