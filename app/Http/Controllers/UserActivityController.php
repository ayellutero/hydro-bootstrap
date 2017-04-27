<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserActivity;

class UserActivityController extends Controller
{
    public function index()
    {
        $users = UserActivity::all();
        return view('UserActivity.index',compact('user_activity'));
    }

    public function store(){
        $useract = Request::all();
        UserActivity::create($useract);
    }
}
