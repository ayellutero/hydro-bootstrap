<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Station;
use App\Part;
use App\Work;
use App\UserActivity;

class StationController extends Controller
{
    public function index(Request $request)
    {
        $parts = Part::all();
        $stations = Station::all();
        $works = Work::all();
        return view('StationManagement.index',compact('stations', 'parts', 'works'));
    }

    public function create()
    {
        return view('StationManagement.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'device_id' => 'required|max:255',
            'location' => 'required|max:255',
            'province' => 'required|max:255',
            'lat' => 'required',
            'lng' => 'required',
            'type' => 'required',
            'sim',
            'elevation',
            'date_deployed',
        ]);

        UserActivity::create($request->all());
        Station::create($request->all());
        return redirect()->back()
                         ->with('success','Station created successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'device_id' => 'required|max:255',
            'province' => 'required|max:255',
            'location' => 'required|max:255',
            'lat' => 'required|min:6',
            'lng' => 'required|min:6',
            'type' => 'required|min:6',
            'sim',
            'elevation',
            'date_deployed',
        ]);

        Station::find($id)->update($request->all());
        return redirect()->back()
                        ->with('success','Station updated successfully,');
    }

    // public function destroy(Request $request, $id)
    // {
    //     Station::find($id)->delete();
    //     return redirect()->back()
    //                     ->with('success','Station deleted successfully');
    // }
}
