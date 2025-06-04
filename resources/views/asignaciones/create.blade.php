@extends('layouts.app')
@section('content')
    <div class="flex flex-col ">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white rounded-2xl shadow-md p-4 m-4 max-w-5xl mx-auto flex">
            <div class="flex flex-row h-full">
                <div class="--w-1/2-- pr-4 pl-4">
                    <form action="{{ route('asignaciones.create')}}" method="POST" class="flex flex-col gap-4 m-8">
                        @csrf
                        <label for="start_date">Fecha de inicio:</label>
                            <input id="start_date" name="start_date" type="date" required>

                        <label for="worksite_id">Obra:</label>
                            <select id="worksite_id" name="worksite_id" required>
                                @foreach ($obras as $obra)
                                    <option value="{{ $obra->id }}">{{ $obra->name }}</option>
                                @endforeach
                            </select>

                        <label for="machine_id">Máquina:</label>
                            <select name="machine_id" id="machine_id" required>
                                @foreach ($maquinas as $maquina)
                                    <option value="{{ $maquina->id }}">{{$maquina->type->name}} : {{ $maquina->model }}</option>
                                @endforeach
                            </select>

                        <img class="w-full max-h-[15vh] object-cover rounded-md" style="max-height:15vh" src="{{ asset('imagenes/maquinita.jpg') }}">
                        
                        <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700">
                            Subir asignacion
                        </button>
                    </form>
                </div>
                <div class="w-1/2 pl-6 flex items-center justify-center">
                    <div class="flex flex-col">
                        <h1 class=" flex flex-col text-yellow-500 text-6xl font-bold mt-10"> + Crear Asignacion</h1>
                        <img class="w-full max-h-96 object-cover rounded-md" src="{{ asset('imagenes/crear_asignaciones.jpg') }}">
                    </div>
                </div>
            </div>
        <div>
    </div>
@endsection
