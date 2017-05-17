<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $fillable=[
    'id',
    'empID',
    'employee_name',
    'position',
    'activity',
    'sent_at_time',
    'sent_at_date'
    ];
}
