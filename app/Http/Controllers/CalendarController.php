<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule; 

class CalendarController extends Controller
{
    public function index(){
        $events = Schedule::all();
        
        return view('Calendar.index', compact('calendar'))->with('events', $events);
    }
}
