<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Part;
use App\Sim;
use App\Station;
use App\Status;
use App\Type;
use App\Work;

class StationController extends Controller
{
    public function index(Request $request)
    {
        $parts = Part::all();
        $sims = Sim::all();
        $stations = Station::all();
        $statuses = Status::all();
        $types = Type::all();
        $works = Work::all();

        return view('StationManagement.index',compact('parts', 'sims', 'stations', 'statuses', 'types', 'works'));
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
            'sim' => 'required',
            'elevation',
            'date_deployed',
            'status',
        ]);

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
            'lat' => 'required',
            'lng' => 'required',
            'type',
            'sim',
            'elevation',
            'date_deployed',
            'status',
        ]);

        Station::find($id)->update($request->all());
        return redirect()->back()
                        ->with('success','Station updated successfully.');
    }
    
    public function destroy(Request $request, $id)
    {
        Station::find($id)->delete();
        return redirect()->back()
                        ->with('success','Station deleted successfully');
    }
}
