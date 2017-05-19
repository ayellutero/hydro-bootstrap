<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Part;
use App\UserActivity;

class PartController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'part' => 'required'
        ]);

        Part::create($request->all());
        // UserActivity::create($request->all());
        return redirect()->back()
                         ->with('success','Part added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'part' => 'required'
        ]);

        $part = Part::find($id);
        $part->update($request->all());
        return redirect()->back()
                        ->with('success','Part updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        Part::find($id)->delete();
        return redirect()->back()
                        ->with('success','Part deleted successfully');
    }
}
