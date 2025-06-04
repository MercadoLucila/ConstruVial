@extends('layouts.app')
@section('content')
<div class="bg-gray-900 min-h-screen py-6">
    <div class="flex flex-row align-middle text-center">
        <h1 class=" font-bold flex ml-6 text-6xl text-yellow-500 ">>Máquinas</h1>
        <form method="GET" action="{{ route('maquinas') }}" class="ml-6 mt-4">
            <select name="estado" onchange="this.form.submit()" class="px-4 py-2 rounded border-gray-300 shadow">
                <option value=""> Ver todas </option>
                @foreach ($estatus as $status)
                    <option value="{{ $status->id }}" {{ request('estado') == $status->id ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </form>
        <a href="{{route('maquinas.prepare')}}" class="ml-auto mt-5 mr-8 text-2xl bg-yellow-500 text-white shadow rounded-md p-2 pl-6 pr-6">Subir Máquina</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-4 lg:grid-cols-3 gap-6 p-6">
        @foreach ($maquinas as $maquina)
            @php
                switch ($maquina->status->name) {
                    case 'Disponible':
                        $color = 'bg-green-600';
                        break;
                    case 'Deshabilitada':
                        $color = 'bg-red-600';
                        break;
                    case 'En mantenimiento':
                        $color = 'bg-yellow-600';
                        break;
                    case 'En camino':
                        $color = 'bg-yellow-600';
                        break;
                    default:
                        $color = 'bg-blue-700';
                        break;
                }
            @endphp
            <div class="bg-white rounded-2xl shadow-md p-4 hover:shadow-xl transition duration-300">
                <div class="flex flex-row justify-between items-center h-full">
                    <div class="w-1/2 pr-2 flex flex-col gap-2">
                        <a href="#">
                            <h5 class="text-lg font-bold tracking-tight text-gray-900 dark:text-white mb-1">
                                {{ $maquina->type->name }}
                            </h5>
                            <h6 class="text-base font-semibold tracking-tight text-gray-900 dark:text-white mb-1">
                                {{ $maquina->serial_number }}
                            </h6>
                        </a>
                        <a target="_onblank" href="{{ route('maquina.pdf', $maquina->id) }}" class="inline-block text-sm font-semibold text-gray-600 bg-gray-200 px-4 py-2 rounded-xl shadow hover:bg-gray-300 hover:text-gray-800 transition duration-300 ease-in-out mb-2">
                            Generar Reporte PDF
                        </a>
                        <p class="text-sm text-gray-700 dark:text-gray-400 mb-2">
                            {{ $maquina->status->description }}
                        </p>
                        <p href="#"
                            class="inline-flex items-center px-3 py-1 text-sm font-medium text-white {{ $color }} rounded-md hover:{{ $color }} focus:ring-2 focus:outline-none focus:ring-blue-300 dark:{{ $color }} dark:hover:{{ $color }} dark:focus:ring-blue-800">
                            {{ $maquina->status->name }}
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </p>
                        <div class="flex space-x-4 mt-4">
                            <a href="{{ route('maquinas.edit', $maquina->id) }}"
                                class="px-4 py-2 bg-yellow-200 text-yellow-800 font-semibold rounded hover:bg-yellow-300 transition">
                                Editar
                            </a>
                            <form action="{{ route('maquinas.destroy', $maquina->id) }}" method="POST" id="{{$maquina->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="eliminarMaquinas({{$maquina->id}})"
                                    class="px-4 py-2 bg-red-200 text-red-800 font-semibold rounded hover:bg-red-300 transition">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="w-1/2 pl-2">
                        <img class="w-full h-42 object-cover rounded-md border border-gray-200 shadow-sm dark:border-gray-700"
                            src="{{ asset('imagenes/' . $maquina->type->name . '.jpg') }}"
                            alt="Imagen de {{ $maquina->type->name}}" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-8 flex items-center justify-center ml-2">
        {{ $maquinas->links() }}
    </div>
    @vite("resources/js/maquinas.js")
</div>
@endsection
