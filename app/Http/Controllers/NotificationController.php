<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\User;
use App\Role;

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
    
    public function update($id){
        $notifs = Notification::where('receiver_id', $id)->get(); // get all notifs for specific user
        $notifUpdate = Request::all();
       
        foreach($notifs as $notif){
            $notif->update($notifUpdate);
        }

        return redirect('myNotifications');
         
    }
}
