@extends('layouts.app')
@section('content')
    <h1 class=" flex flex-col text-center text-black text-4xl font-bold mt-4"> >Editar Mantenimiento</h1>
    <div class="flex flex-col gap-4">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white rounded-2xl shadow-md p-4 m-4 max-w-5xl mx-auto">
            <div class="flex flex-row h-full">
                <div class="w-1/2 pr-4">
                    <form action="{{ route ('mantenimientos.update', $mantenimientos->id)}}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        @method('PATCH')
                        <label for="service_date">Fecha de mantenimiento:</label>
                        <input id="service_date" name="service_date" value="{{ old('service_date', $mantenimientos->service_date) }}" type="date">
                        <label for="service_motive">Service_motive:</label>
                        <input id="service_motive" name="service_motive" value="{{ old('service_motive', $mantenimientos->service_motive) }}" type="text">
                        <label for="machine_id">Maquina:</label>
                            <select name="machine_id" id="machine_id">
                                <option value="{{ old('machine_id', $mantenimientos->machine->id) }}">{{$mantenimientos->machine->serial_number}} - {{$mantenimientos->machine->type->name}}</option>
                                @foreach ($maquinas as $maquina)
                                    <option value="{{ $maquina->id }}">{{ $maquina->serial_number }} - {{ $maquina->type->name }}</option>
                                @endforeach
                            </select>
                        <label for="maintenance_id">Tipo de Mantenimiento:</label>
                            <select name="maintenance_id" id="maintenance_id">
                                <option value="{{ old('maintenance_id', $mantenimientos->maintenance->id) }}">{{$mantenimientos->maintenance->name}}</option>
                                @foreach ($tiposMantenimientos as $mantenimiento)
                                    <option value="{{ $mantenimiento->id }}">{{ $mantenimiento->name }}</option>
                                @endforeach
                            </select>
                        <button type="submit" class="bg-yellow-600 text-white py-2 px-4 rounded hover:bg-yellow-700">
                            Actualizar
                        </button>
                    </form>
                </div>
                <div class="w-1/2 pl-4 flex items-center justify-center">
                    <img class="w-full max-h-96 object-cover rounded-md border border-gray-200 shadow-sm dark:border-gray-700" src="{{ asset('imagenes/editar_obra.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
       
