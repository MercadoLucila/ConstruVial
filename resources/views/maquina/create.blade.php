@extends('layouts.app')
@section('content')
    <div class="flex flex-col gap-4">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white rounded-2xl shadow-md p-4 m-4 max-w-5xl mx-auto mt-20 flex">
            <div class="flex flex-row h-full">
                <div class="--w-1/2-- pr-4 pl-4">
                    <form action="{{ route('maquinas.create')}}" method="POST" class="flex flex-col gap-4 m-8">
                        @csrf
                        <label for="model">Model:</label>
                            <input id="model" name="model" type="text">
                        <label for="serial_number">Serial Number:</label>
                            <input id="serial_number" name="serial_number" type="text">
                        <label for="actual_km">Actual Km:</label>
                            <input id="actual_km" name="actual_km" type="text">
                        <label for="type">Type:</label>
                            <select name="type" id="type">
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                                @endforeach
                            </select>
                        <label for="status">Status:</label>
                            <select name="status" id="status">
                                @foreach ($estatus as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700">
                            Crear
                        </button>
                    </form>
                </div>
                <div class="w-1/2 pl-6 flex items-center justify-center">
                    <div class="flex flex-col">
                        <h1 class=" flex flex-col text-center text-yellow-500 text-6xl font-bold mt-10"> + Crear Máquina</h1>
                        <img class="w-full max-h-96 object-cover rounded-md" src="{{ asset('imagenes/crear_maquina.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
