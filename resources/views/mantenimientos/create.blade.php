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
                    <form action="{{ route('mantenimientos.create')}}" method="POST" class="flex flex-col gap-4 m-8">
                        @csrf
                        <label for="service_motive">Motivo:</label>
                            <input id="service_motive" name="service_motive" type="text" required>
                        <label for="service_date">Fecha de Mantenimiento:</label>
                            <input id="service_date" name="service_date" type="date" required>
                        <label for="maintenance_id">Mantenimientos Posibles:</label>
                            <select name="maintenance_id" id="maintenance_id" required>
                                @foreach ($maintenances as $maintenance)
                                    <option value="{{ $maintenance->id }}">{{ $maintenance->name }}</option>
                                @endforeach
                            </select>
                        <label for="machine_id">Maquinarias:</label>
                            <select name="machine_id" id="machine_id" required>
                                @foreach ($machines as $machine)
                                    <option value="{{ $machine->id }}">{{ $machine->type->name }} - {{ $machine->serial_number }}</option>
                                @endforeach
                            </select>
                        <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700">
                            Crear
                        </button>
                    </form>
                </div>
                <div class="w-1/2 pl-6 flex items-center justify-center">
                    <div class="flex flex-col">
                        <h1 class=" flex flex-col text-center text-yellow-500 text-6xl font-bold mt-10"> + Subir Mantenimiento</h1>
                        <img class="w-full max-h-96 object-cover rounded-md" src="{{ asset('imagenes/crear_obra.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
