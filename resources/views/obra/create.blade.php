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
                    <form action="{{ route('obras.create')}}" method="POST" class="flex flex-col gap-4 m-8">
                        @csrf
                        @method('PUT')
                        <label for="name">Nombre:</label>
                        <input id="name" name="name" type="text" required>
                        <label for="start_date">Fecha de Inicio:</label>
                        <input id="start_date" name="start_date" type="date" required>
                        <label for="end_date">Fecha de fin:</label>
                        <input id="end_date" name="end_date" value="null" type="date">
                        <label for="province_id">Provincia:</label>
                        <select name="province_id" id="province_id" required>
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia->id }}">{{ $provincia->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700">
                            Crear
                        </button>
                    </form>
                </div>
                <div class="w-1/2 pl-6 flex items-center justify-center">
                    <div class="flex flex-col">
                        <h1 class=" flex flex-col text-center text-yellow-500 text-6xl font-bold mt-10"> + Crear Obra</h1>
                        <img class="w-full max-h-96 object-cover rounded-md" src="{{ asset('imagenes/crear_obra.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
