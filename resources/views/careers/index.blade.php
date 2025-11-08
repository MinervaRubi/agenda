@extends('layouts.app')

@section('title', 'Carreras')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Listado de Carreras</h1>
    <a href="{{ route('careers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
        Nueva Carrera
    </a>
</div>

<table class="min-w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Nombre</th>
            <th class="px-4 py-2">Descripción</th>
            <th class="px-4 py-2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($careers as $career)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $career->id }}</td>
                <td class="px-4 py-2">{{ $career->nombre }}</td>
                <td class="px-4 py-2">{{ $career->descripcion }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('careers.edit', $career) }}" class="text-blue-600 hover:underline">Editar</a>
                    <form action="{{ route('careers.destroy', $career) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline"
                            onclick="return confirm('¿Seguro que deseas eliminar esta carrera?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                    No hay carreras registradas.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
