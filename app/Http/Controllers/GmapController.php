<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class GmapController extends Controller
{
    public function gmaps()
    {
    	$locations = DB::table('locations')->get();
    	return view('gmaps',compact('locations'));
    }
}
