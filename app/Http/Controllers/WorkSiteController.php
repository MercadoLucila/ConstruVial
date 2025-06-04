<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\WorkSite;
use Illuminate\Http\Request;

class WorkSiteController extends Controller
{
    public function traerObras()
    {
        $obras = WorkSite::with('province')->paginate(8);

        return view('obras', compact('obras'));
    }

    public function delete($id)
    {
        $obra = WorkSite::findOrFail($id);
        $obra->delete();

        return redirect()->route("obras")->with('success','Obra eliminada con éxito');
    }

    public function edit($id)
    {
        $obra = WorkSite::with('province')->findOrFail($id);
        $provincias = Province::all();

        return view ("/obra/edit", compact("obra","provincias"));
    }

    public function update(Request $request, $id)
    {
        $obra = WorkSite::findOrFail($id);
        $obra->update($request->all());

        return redirect()->route("obras.edit", $obra->id)->with('success','Obra editada con exito.');
    }

    public function prepare()
    {
        $provincias = Province::all();

        return view("obra.create", compact('provincias'));
    }

    public function create (Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'province_id' => 'required|exists:provinces,id',
        ]);
        
        WorkSite::create([
            'name' => $validated['name'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'province_id' => $validated['province_id']
        ]);

        return redirect()->route("obras.prepare")->with('success', 'Obra creada con exito.');
    }
}
