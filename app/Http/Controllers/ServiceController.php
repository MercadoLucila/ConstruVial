<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Maintenance;
use App\Models\Service;
use App\Models\Status;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function traerMantenimientos()
    {
        $mantenimientos = Service::with(['machine.type', 'maintenance'])->get();

        return view('mantenimientos', compact('mantenimientos'));
    }

    public function delete($id)
    {
        $mantenimiento = Service::findOrFail($id);
        $mantenimiento->delete();

        return redirect()->route("mantenimientos")->with('success','Mantenimiento eliminado con éxito');
    }

    public function edit($id)
    {
        $mantenimientos = Service::with(['machine.type', 'maintenance'])->findOrFail($id);
        $maquinas = Machine::all();
        $tiposMantenimientos = Maintenance::all();

        return view ("/mantenimientos/edit", compact("mantenimientos","maquinas", "tiposMantenimientos"));
    }

    public function update(Request $request, $id)
    {
        $mantenimientos = Service::findOrFail($id);
        $mantenimientos->service_date=$request->input('service_date');
        $mantenimientos->service_motive=$request->input('service_motive');
        $mantenimientos->machine_id=$request->input('machine_id');
        $mantenimientos->maintenance_id=$request->input('maintenance_id');
        $mantenimientos->save();

        $statusEnMantenimiento = Status::where('name', 'En mantenimiento')->firstOrFail();

        $maquina = Machine::findOrFail($request->input('machine_id'));
        $maquina->status_id = $statusEnMantenimiento->id;
        $maquina->save();

        return redirect()->route("mantenimientos.edit", $mantenimientos->id)->with('success','Mantenimiento editado con exito.');
    }

    public function prepare()
    {
        $mantenimientoStatus = Status::where('name', 'En mantenimiento')->first();
        $machines = Machine::with('type')
                    ->where('status_id', '!=', $mantenimientoStatus->id)
                    ->get();
        $maintenances = Maintenance::all();

        return view("mantenimientos.create", compact('machines','maintenances'));
    }

    public function create (Request $request)
    {
        Service::create([
            'service_motive' => $request->input('service_motive'),
            'service_date' => $request->input('service_date'),
            'maintenance_id' => $request->input('maintenance_id'),
            'machine_id' => $request->input('machine_id')
        ]);

        $status = Status::where('name', 'En mantenimiento')->firstOrFail();
        $machine = Machine::findOrFail($request->input('machine_id'));
        $machine->status_id = $status->id;
        $machine->save();

        return redirect()->route("mantenimientos.prepare")->with('success', 'Mantenimiento subido con exito.');
    }
}
