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
        UserActivity::create($request->all());
        return redirect()->back()
                         ->with('success','Device added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'part' => 'required'
        ]);

        $part->update($request->all());
        return redirect()->back()
                        ->with('success','Part updated successfully');
    }
}
