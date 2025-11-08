@extends('layouts.app')

@section('title', 'Estudiantes')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Listado de Estudiantes</h1>
    <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
        Nuevo Estudiante
    </a>
</div>

<table class="min-w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Nombre</th>
            <th class="px-4 py-2">Correo</th>
            <th class="px-4 py-2">Carrera</th>
            <th class="px-4 py-2">Semestre</th>
            <th class="px-4 py-2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($students as $student)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $student->id }}</td>
                <td class="px-4 py-2">{{ $student->nombre }}</td>
                <td class="px-4 py-2">{{ $student->correo }}</td>
                <td class="px-4 py-2">{{ $student->career?->nombre }}</td>
                <td class="px-4 py-2">{{ $student->semestre }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('students.edit', $student) }}" class="text-blue-600 hover:underline">Editar</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline"
                            onclick="return confirm('¿Seguro que deseas eliminar este estudiante?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                    No hay estudiantes registrados.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
