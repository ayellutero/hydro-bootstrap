<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sim;

class SimController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'sim' => 'required'
        ]);

        Sim::create($request->all());
        return redirect()->back()
                        ->with('success','Sim added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sim' => 'required'
        ]);

        $sim = Sim::find($id);
        $sim->update($request->all());
        return redirect()->back()
                        ->with('success','Sim updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        Sim::find($id)->delete();
        return redirect()->back()
                        ->with('success','Sim deleted successfully');
    }
}
