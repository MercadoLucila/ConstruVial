@extends('layouts.app')
@section('content')
<div class="bg-gray-900 min-h-screen py-6">

    <div class="flex flex-row align-middle text-center mb-6">
        <h1 class="font-bold text-yellow-500 ml-6 text-shadow text-6xl ">>Obras</h1>
        <a href="{{ route('obras.prepare') }}" class="ml-auto mt-2 mr-8 text-2xl bg-black text-yellow-500 shadow rounded-md p-2 px-6">
           Subir obra
        </a>
    </div>

    <div class="overflow-x-auto px-6">
        <table class="min-w-full divide-y divide-yellow-500 bg-white rounded-x3 shadow">
            <thead class="bg-yellow-500">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-black">Nombre</th>
                    <th class="pr-6 py-3 text-left text-sm font-semibold text-black">Provincia</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-black">Comienzo</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-black">Final</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-black">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-orange-200">
                @foreach ($obras as $obra)
                    <tr>
                        <td class="pl-3 py-2 text-sm text-gray-800 font-medium">{{ $obra->name }}</td>
                        <td class="pr-3 py-2 text-sm text-gray-800">{{ $obra->province->name }}</td>
                        <td class="px-3 py-2 text-sm text-gray-800">{{ $obra->start_date }}</td>
                        <td class="px-3 py-2 text-sm text-gray-800">{{ $obra->end_date }}</td>
                        <td class="px-3 py-2 text-center space-x-2">
                            <a href="{{ route('obras.edit', $obra->id) }}" class="px-3 py-1 bg-yellow-200 text-yellow-800 text-sm font-semibold rounded hover:bg-yellow-300 transition">
                                Editar
                            </a>
                            <form action="{{ route('obras.destroy', $obra->id) }}"
                                method="POST" class="inline-block" id="{{$obra->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="eliminarObras({{$obra->id}})"
                                        class="px-3 py-1 bg-red-200 text-red-800 text-sm font-semibold rounded hover:bg-red-300 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">
                        <div class="flex justify-center bg-yellow-500">
                            {{ $obras->links() }}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @vite("resources/js/obras.js")
</div>
@endsection
