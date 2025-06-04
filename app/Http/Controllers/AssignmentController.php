<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Machine;
use App\Models\Status;
use App\Models\WorkSite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
   public function traerAsignaciones(Request $request)
   {
        $estado = $request->query('estado'); 
        $machineId = $request->query('machine_id');
        $hoy = Carbon::now()->startOfDay();

        $query = Assignment::with(['machine.type', 'worksite.province']);

        if ($estado === 'progreso') {
            $query->where(function ($q) use ($hoy) {
                $q->whereNull('end_date')
                ->orWhere('end_date', '>=', $hoy);
            });
        } elseif ($estado === 'finalizada') {
            $query->whereNotNull('end_date')
                ->where('end_date', '<', $hoy);
        }

        if ($machineId) {
            $query->where('machine_id', $machineId);
        }

        $asignaciones = $query->get();
        $maquinarias = Machine::whereIn('id', Assignment::select('machine_id')->distinct())->get();

        return view("asignaciones", compact("asignaciones", "maquinarias"));
    }


    public function delete($id)
    {
        $asignacion = Assignment::with('machine')->findOrFail($id);
        $statusDisponible = Status::where('name', 'Disponible')->firstOrFail();
        $maquinaria = $asignacion->machine;
        $maquinaria->status_id = $statusDisponible->id;
        $maquinaria->save();
        $asignacion->delete();

        return redirect()->route("asignaciones")->with('success','Asignacion eliminada correctamente.');
    }

    public function edit($id)
    {
        $asignacion = Assignment::with(['worksite', 'machine'])->findOrFail($id);
        $maquinas = Machine::whereHas('status', function ($query){
                    $query->where('name', 'disponible');
                    })->get();
        $obras = WorkSite::all();

        return view("asignaciones.edit", compact("asignacion","maquinas","obras"));
    }

    public function update(Request $request, $id)
    {
        $asignacion = Assignment::findOrFail($id);
        if($request->input('end_date') == null){
            $asignacion->end_date=null;
            $asignacion->end_motive=null;
            $asignacion->km=null;
        }
        if($request->input('arrive_time')==null)
        {
            $asignacion->arrive_time=null;
        }
        $asignacion->start_date=$request->input('start_date');
        $asignacion->worksite_id=$request->input('worksite_id'); 
        $asignacion->machine_id=$request->input('machine_id');
        $asignacion->save(); 

        return redirect()->route("asignaciones.edit", $asignacion->id)->with('success', 'Asignacion editada correctamente.');
    }

    public function prepare()
    {
        $maquinas = Machine::with('type')->whereHas('status', function ($query) {
                    $query->where('name', 'disponible');
                    })->get();
        $obras = WorkSite::all();

        return view("asignaciones.create", compact("maquinas","obras"));
    }
    
    public function store(Request $request)
    {
        Assignment::create([
            'start_date'=> $request->input('start_date'),
            'end_date'=> null,
            'end_motive'=> null,
            'arrive_time'=> null,
            'kms'=> null,
            'worksite_id'=> $request->input('worksite_id'),
            'machine_id'=> $request->input('machine_id'),
        ]);

        return redirect()->route("asignaciones.prepare")->with('success', 'Asignacion realizada con éxito, la maquinaria está en camino.');
    }

    public function finish(Request $request, $id)
    {
        $asignacion = Assignment::findOrFail($id);
        $asignacion->end_motive=$request->input('end_motive');
        $asignacion->end_date=$request->input('end_date');
        $asignacion->kms=$request->input('kms');
        $asignacion->save();

        $maquinaria = $asignacion->machine;
        $maquinaria->actual_km += $asignacion->kms;
        $statusDisponible = Status::where('name', 'Disponible')->firstOrFail();
        $maquinaria->status_id = $statusDisponible->id;
        $maquinaria->save();

        return redirect()->route("asignaciones.prepare.finish", $asignacion->id)->with('success', 'Asignacion finalizada con éxito.');
    }

    public function arrive($id)
    {
        $asignacion = Assignment::findOrFail($id);
        $asignacion->arrive_time = now(); 
        $asignacion->save();

        return redirect()->back()->with('success', 'Hora de llegada registrada.');
    }

    public function prepareFinish($id)
    {
        $asignacion = Assignment::findOrFail($id);

        return view("asignaciones.finish", compact("asignacion"));
    }


    
}
