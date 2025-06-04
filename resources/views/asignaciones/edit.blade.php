@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white rounded-2xl shadow-md p-4 m-4 max-w-5xl mx-auto">
            <div class="flex flex-row h-full">
                <div class="w-1/2 pr-4">
                    <form action="{{ route ('obras.update', $asignacion->id)}}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        @method('PATCH')
                        <label for="start_date">Fecha de inicio:</label>
                            <input id="start_date" name="start_date" value="{{ old('start_date', $asignacion->start_date) }}" type="date">
                        @if($asignacion->end_date<>null)
                        {
                            <label for="end_date">Fecha de finalizacion:</label>
                                <input id="end_date" name="end_date" value="{{ old('end_date', $asignacion->end_date) }}" type="date">
                            <label for="end_motive">Motivo de finalizacion:</label>
                                <input id="end_motive" name="end_motive" value="{{ old('end_motive', $asignacion->end_motive) }}" type="text">
                            <label for="kms">Kilometraje total recorrido por la máquina en la obra:</label>
                                <input id="kms" name="kms" value="{{ old('kms', $asignacion->kms) }}" type="number" min="0">
                        }
                        @endif
                        @if($asignacion->arrive_time<>null)    
                            <label for="arrive_time">Tiempo de llegada:</label>
                                <input id="arrive_time" name="arrive_time" value="{{ old('arrive_time', $asignacion->arrive_time) }}" type="time">
                        @endif
                        <label for="worksite_id">Obra:</label>
                            <select name="worksite_id" id="worksite_id">
                                <option value="{{ old('worksite_id', $asignacion->worksite->id) }}">{{$asignacion->worksite->name}}</option>
                                @foreach ($obras as $obra)
                                    <option value="{{ $obra->id }}">{{ $obra->name }}</option>
                                @endforeach
                            </select>
                        <label for="machine_id">Maquina:</label>
                            <select name="machine_id" id="machine_id">
                                <option value="{{ old('machine_id', $asignacion->machine->id) }}">{{$asignacion->machine->name}}{{$asignacion->machine->type->name}}</option>
                                @foreach ($maquinas as $maquina)
                                    <option value="{{ $maquina->id }}">{{ $maquina->name }}{{ $maquina->type->name }}</option>
                                @endforeach
                            </select>
                        <button type="submit" class="bg-yellow-600 text-white py-2 px-4 rounded hover:bg-yellow-700">
                            Actualizar
                        </button>
                    </form>
                </div>
                <div class="w-1/2 pl-4 flex flex-col items-center justify-center">
                    <h1 class=" flex flex-col text-center text-black text-6xl font-bold mt-2 mb-2"> Editar Obra</h1>
                    <img class="w-full max-h-96 object-cover rounded-md border border-gray-200 shadow-sm dark:border-gray-700"
                        src="{{ asset('imagenes/editar_obra.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection