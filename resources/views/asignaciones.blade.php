@php
    use \Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('content')
<div class="bg-gray-900 min-h-screen py-6">
    <div class="flex flex-row align-middle text-center">
        <h1 class=" font-bold flex ml-6 text-6xl  text-yellow-500"> >Asignaciones</h1>
        <form method="GET" action="{{ route('asignaciones') }}" class="ml-6 mt-4">
            <select name="estado" onchange="this.form.submit()" class="px-4 py-2 rounded border-gray-300 shadow">
                <option value=""> Ver todas </option>
                <option value="progreso" {{ request('estado') === 'progreso' ? 'selected' : '' }}>En Progreso</option>
                <option value="finalizada" {{ request('estado') === 'finalizada' ? 'selected' : '' }}>Finalizadas</option>
            </select>
            <select name="machine_id" onchange="this.form.submit()" class="px-4 py-2 rounded border-gray-300 shadow">
                <option value="">Todas las máquinas</option>
                @foreach ($maquinarias as $maquinaria)
                    <option value="{{ $maquinaria->id }}" {{ request('machine_id') == $maquinaria->id ? 'selected' : '' }}>
                        {{ $maquinaria->model }}
                    </option>
                @endforeach
            </select>
        </form>
        <a href="{{route('asignaciones.prepare')}}" class="ml-auto mt-2 mr-8 text-2xl bg-yellow-500 text-black shadow rounded-md p-2 pl-8 pr-6">Asignar Maquinaria</a>
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="flex flex-wrap gap-6 p-6">
        @foreach ($asignaciones as $asignacion)
           <div class="w-[48%] bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300">
                <div class="flex flex-row justify-between items-center h-full border-rounded border-gray-900">
                    <div class="w-1/4 flex flex-col p-4 ">
                        <a href="#">
                            <h5 class="text-lg font-bold tracking-tight text-gray-900 dark:text-white mb-1">
                                Obra: {{ $asignacion->worksite->name }}
                            </h5>
                            <p class="text-sm font-semibold tracking-tight text-gray-600 dark:text-white mb-1">
                                Provincia: {{ $asignacion->worksite->province->name}}
                            </p>
                            <p class="text-sm font-semibold tracking-tight text-gray-600 dark:text-white mb-1">
                                Comienzo: {{ $asignacion->start_date}}
                            </p>
                            <p class="text-sm font-semibold tracking-tight text-gray-600 dark:text-white mb-1">
                                Final:{{ $asignacion->end_date}}
                            </p>
                        </a>
                    </div>
                    <div class=" flex flex-col align-middle items-center">
                        <img class=" w-16 object-cover rounded-md  "
                            src="{{ asset('imagenes/cadena.png') }}" />
                        @if ($asignacion->end_date <> null || Carbon::parse($asignacion->end_date)->lt(Carbon::now()->startOfDay()))
                            <a class="text-red-700 font-bold"> Finalizada
                        @else
                            <a class="text-green-700 font-bold ">En Progreso
                        @endif
                        </a>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold tracking-tight text-gray-900 dark:text-white mb-1">
                                Máquina asignada: {{$asignacion->machine->model }}
                        </h5>
                        <img class="w-full h-36 object-contain rounded-2x1  "
                            src="{{ asset('imagenes/' . $asignacion->machine->type->name . '.jpg') }}" />
                    </div>
                    <div class="flex flex-col justify-center items-center space-y-4 h-full pr-4 pl-4 rounded-2xl  bg-yellow-100">
                        @if ($asignacion->end_date == null)
                            <a href="{{ route('asignaciones.prepare.finish', $asignacion->id)}}" class="px-4 py-2 bg-orange-400 text-yellow-800 font-semibold rounded hover:bg-orange-300 transition">
                               Finalizar
                            </a>
                        @endif
                        @if ($asignacion->arrive_time == null)
                            <form action="{{ route('asignaciones.arrive', $asignacion->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 bg-green-400 text-green-800 font-semibold rounded hover:bg-green-300 transition">
                                    +Llegada
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('asignaciones.edit', $asignacion->id)}}" class="px-4 py-2 bg-yellow-400 text-yellow-800 font-semibold rounded hover:bg-yellow-300 transition">
                            Editar
                        </a>
                        <form action="{{ route('asignaciones.destroy', $asignacion->id) }}" method="POST" id="{{$asignacion->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="eliminarAsignacion({{$asignacion->id}})"
                                    class="px-4 py-2 bg-red-200 text-red-800 font-semibold rounded hover:bg-red-300 transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @vite("resources/js/asignaciones.js")
</div>
@endsection
