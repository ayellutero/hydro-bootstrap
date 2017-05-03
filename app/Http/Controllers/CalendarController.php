<?php

namespace App\Http\Controllers;

use App\Schedule; 
use Request;

class CalendarController extends Controller
{
    public function index(){
        $events = Schedule::all();
        
        return view('Calendar.index', compact('calendar'))->with('events', $events);
    }

    public function store(){
        $schedule=Request::all();
        Schedule::create($schedule);
        return redirect('calendar')->with('message', 'Successfully scheduled a maintenance!');
    }

    public function destroy($id){

    }

    public function update($id){

    }
}
