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
                    <form action="{{ route('asignaciones.finish', $asignacion->id)}} " method="POST" class="flex flex-col gap-4 m-8">
                        @csrf
                        @method('PATCH')    
                        <label for="end_motive">Motivo de finalización:</label>
                            <input id="end_motive" name="end_motive" type="text" >
                        <label for="end_date">Fecha de finalización:</label>
                            <input id="end_date" name="end_date" type="date" >
                        <label for="kms">Kilometraje recorrido por la maquinaria durante la asignación:</label>
                            <input id="kms" name="kms" min="0" type="number" >
                        <img class="w-full max-h-[15vh] object-cover rounded-md" style="max-height:15vh" src="{{ asset('imagenes/maquinita.jpg') }}">
                        <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700">
                            Finalizar asignación
                        </button>
                    </form>
                </div>
                <div class="w-1/2 pl-6 flex items-center justify-center">
                    <div class="flex flex-col">
                        <h1 class=" flex flex-col text-yellow-500 text-6xl font-bold mt-10 mb-4 "> Finalizar Asignacion</h1>
                        <img class="w-full max-h-64 object-cover rounded-md" src="{{ asset('imagenes/finalizar_asignacion.png') }}">
                    </div>
                </div>
            </div>
        <div>
    </div>
@endsection