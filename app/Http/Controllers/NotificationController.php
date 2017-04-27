<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;

class NotificationController extends Controller
{
    //
    public function index()
    {
      $notifications=Notification::all();
      return view('Notifications.index',compact('notifications'));
    }

    public function store(){
        $notif = Request::all();
        Notification::create($notif);
    }
    
}
