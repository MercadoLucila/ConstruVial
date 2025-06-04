<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Status;
use App\Models\Type;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function traerMaquinas(Request $request)
    {
        $query = Machine::with(['type', 'status']);

        if ($request->filled('estado')) {
            $estadoId = $request->estado;
            $query->where('status_id', $estadoId);
        }

        $maquinas = $query->paginate(6)->withQueryString();
        $tipos = Type::all();
        $estatus = Status::all();

        return view('maquinas', compact('maquinas', 'tipos', 'estatus'));
    }

    public function generarPDF($id)
    {
        $maquina = Machine::with(['assignment.worksite','type','status'])->find($id);

        $pdf = Pdf::loadView('pdf.plantilla',compact('maquina'));

        return $pdf->stream('documento.pdf');
    }

    public function delete($id)
    {
        $maquina = Machine::findOrFail($id);
        $maquina->delete();

        return redirect()->route("maquinas")->with('success','Máquina eliminada correctamente.');
    }

    public function edit($id)
    {
        $maquina = Machine::findOrFail($id);
        $tipos = Type::all();
        $estatus = Status::all();

        return view("maquina.edit", compact("maquina","tipos","estatus"));
    }

    public function update(Request $request, $id)
    {
        $maquina = Machine::findOrFail($id);
        $maquina->update($request->all());

        return redirect()->route("maquinas.edit", $maquina->id)->with('success', 'Máquina editada correctamente.');
    }

    public function prepare()
    {
        $tipos = Type::all();
        $estatus = Status::all();

        return view("maquina.create", compact("tipos","estatus"));
    }
    
    public function create(Request $request)
    {   
        Machine::create([
            'model' => $request->input('model'),
            'serial_number' => $request->input('serial_number'),
            'actual_km' => $request->input('actual_km'),
            'type_id' => $request->input('type_id'),
            'status_id' => $request->input('status_id'),
        ]);

        return redirect()->route("maquinas.prepare")->with('success', 'Máquina creada con éxito.');
    }
}
