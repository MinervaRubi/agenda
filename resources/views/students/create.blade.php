@extends('layouts.app')

@section('title', 'Nuevo Estudiante')

@section('content')
<h1 class="text-2xl font-bold mb-4">Registrar nuevo Estudiante</h1>

<form action="{{ route('students.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf

    <div>
        <label class="block mb-1 font-semibold">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Correo</label>
        <input type="email" name="correo" value="{{ old('correo') }}" class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Carrera</label>
        <select name="career_id" class="w-full border rounded px-3 py-2">
            <option value="">-- Selecciona una carrera --</option>
            @foreach ($careers as $career)
                <option value="{{ $career->id }}" @selected(old('career_id') == $career->id)>
                    {{ $career->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1 font-semibold">Semestre</label>
        <input type="number" name="semestre" value="{{ old('semestre') }}" class="w-full border rounded px-3 py-2" min="1" max="12">
    </div>

    <div class="flex justify-end space-x-2">
        <a href="{{ route('students.index') }}" class="px-4 py-2 rounded border">Cancelar</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
    </div>
</form>
@endsection
