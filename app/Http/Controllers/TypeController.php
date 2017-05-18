<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;

class TypeController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required'
        ]);

        Type::create($request->all());
        // UserActivity::create($request->all());
        return redirect()->back()
                         ->with('success','Type added successfully.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'required'
        ]);

        $type = Type::find($id);
        $type->update($request->all());
        return redirect()->back()
                        ->with('success','Type updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        Type::find($id)->delete();
        return redirect()->back()
                        ->with('success','Type deleted successfully');
    }
}
