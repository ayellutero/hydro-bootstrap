<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;

class WorkController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'work' => 'required'
        ]);

        Work::create($request->all());
        return redirect()->back()
                         ->with('success','Work created successfully');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'work',
        ]);
 
        $work = Work::find($id);
        $work->update($request->all());
        
        return redirect()->back()
                        ->with('success','Work updated successfully');
    }
}
