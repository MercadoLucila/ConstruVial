@extends('layouts.app')
@section('content')
    <div class="flex flex-col gap-4">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        @foreach ($tipos as $tipo)
            @if ($maquina->type_id == $tipo->id) 
                @php
                    $nombreTipoMaquina = $tipo->name;
                @endphp  
            @endif
        @endforeach
        <div class="bg-white rounded-2xl shadow-md p-4 m-4 max-w-5xl mx-auto">
            <div class="flex flex-row h-full">
                <div class="w-1/2 pr-4">
                    <form action="{{ route('maquinas.update', $maquina->id) }}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        @method('PATCH')
                        <label for="model">Model:</label>
                            <input id="model" name="model" value="{{ old('model', $maquina->model) }}" type="text">
                        <label for="serial_number">Serial Number:</label>
                            <input id="serial_number" name="serial_number" value="{{ old('serial_number', $maquina->serial_number) }}" type="text">
                        <label for="actual_km">Actual Km:</label>
                            <input id="actual_km" name="actual_km" value="{{ old('actual_km', $maquina->actual_km) }}" type="text">
                        <label for="type">Type:</label>
                            <select name="type" id="type">
                                <option value="{{ old('type_id', $maquina->type_id) }}"></option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                @endforeach
                            </select>
                        <label for="status">Status:</label>
                            <select name="status" id="status">
                                <option value="{{ old('status_id', $maquina->status_id) }}"></option>
                                @foreach ($estatus as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        <button type="submit" class="bg-yellow-600 text-white py-2 px-4 rounded hover:bg-yellow-700">
                            Actualizar
                        </button>
                    </form>
                </div>
                <div class="w-1/2 pl-4 flex flex-col items-center justify-center">
                    <h1 class=" flex text-center text-yellow-500 text-6xl font-bold mt-4 mb-4">> Editar Máquina</h1>
                    <img class="w-full max-h-96 object-cover rounded-md border border-gray-200 shadow-sm dark:border-gray-700"
                        src="{{ asset('imagenes/' . $nombreTipoMaquina . '.jpg') }}"
                        alt="{{ $nombreTipoMaquina }}">
                </div>
            </div>
        </div>
    </div>
@endsection
       
