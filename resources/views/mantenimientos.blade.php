@extends('layouts.app')
@section('content')
<div class="bg-gray-900 min-h-screen py-6">
    <div class="flex flex-row align-middle text-center mb-6">
        <h1 class="font-bold text-yellow-500 ml-6 text-shadow text-6xl ">>Mantenimientos</h1>
        <a href="{{ route('mantenimientos.prepare') }}"
           class="ml-auto mt-2 mr-8 text-2xl bg-black text-yellow-500 shadow rounded-md p-2 px-6">
           Cargar Mantenimiento
        </a>
    </div>
    <div class="overflow-x-auto px-6">
        <table class="min-w-full divide-y divide-yellow-500 bg-white rounded-x3 shadow">
            <thead class="bg-yellow-500">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-black">Máquina</th>
                    <th class="pr-6 py-3 text-left text-sm font-semibold text-black">Mantenimiento</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-black">Motivo</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-black">Fecha</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-black">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-orange-200">
                @foreach ($mantenimientos as $mantenimiento)
                    <tr>
                        <td class="pl-3 py-2 text-sm text-gray-800 font-medium">
                            {{ $mantenimiento->machine->serial_number }} - {{ $mantenimiento->machine->type->name }}
                        </td>
                        <td class="pr-3 py-2 text-sm text-gray-800">
                            {{ $mantenimiento->maintenance->name }}
                        </td>
                        <td class="px-3 py-2 text-sm text-gray-800">
                            {{ $mantenimiento->service_motive }}
                        </td>
                        <td class="px-3 py-2 text-sm text-gray-800">
                            {{ $mantenimiento->service_date }}
                        </td>
                        <td class="px-3 py-2 text-center space-x-2">
                            <a href="{{ route('mantenimientos.edit', $mantenimiento->id) }}" class="px-3 py-1 bg-yellow-200 text-yellow-800 text-sm font-semibold rounded hover:bg-yellow-300 transition">
                                Editar
                            </a>
                            <form action="{{ route('mantenimientos.destroy', $mantenimiento->id) }}"
                                method="POST" class="inline-block" id="{{$mantenimiento->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="px-3 py-1 bg-red-200 text-red-800 text-sm font-semibold rounded hover:bg-red-300 transition" onclick="eliminarMantenimiento({{$mantenimiento->id}})">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    @vite("resources/js/mantenimiento.js")

@endsection
