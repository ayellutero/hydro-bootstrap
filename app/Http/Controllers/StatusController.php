<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Status;

class StatusController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        Status::create($request->all());
        // UserActivity::create($request->all());
        return redirect()->back()
                         ->with('success','Status added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        $status = Status::find($id);
        $status->update($request->all());
        return redirect()->back()
                        ->with('success','Status updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        Status::find($id)->delete();
        return redirect()->back()
                        ->with('success','Status deleted successfully');
    }
}
