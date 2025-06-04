@extends('layouts.app')
@section('content')
    <h1 class=" flex flex-col text-center text-black text-4xl font-bold mt-4"> Editar Obra</h1>
    <div class="flex flex-col gap-4">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white rounded-2xl shadow-md p-4 m-4 max-w-5xl mx-auto">
            <div class="flex flex-row h-full">
                <div class="w-1/2 pr-4">
                    <form action="{{ route ('obras.update', $obra->id)}}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        @method('PATCH')
                        <label for="name">Nombre:</label>
                            <input id="name" name="name" value="{{ old('name', $obra->name) }}" type="text">
                        <label for="start_date">Fecha de inicio:</label>
                            <input id="start_date" name="start_date" value="{{ old('start_date', $obra->start_date) }}" type="date">
                        <label for="end_date">Actual Km:</label>
                            <input id="end_date" name="end_date" value="{{ old('end_date', $obra->end_date) }}" type="date">
                        <label for="province_id">Provincia:</label>
                            <select name="province_id" id="province_id">
                                <option value="{{ old('type_id', $obra->province->id) }}">{{$obra->province->name}}</option>
                                @foreach ($provincias as $provincia)
                                    <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
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
       
