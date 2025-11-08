@extends('layouts.app')

@section('title', 'Editar Estudiante')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Editar Estudiante</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block mb-1">Nombre</label>
            <input type="text" name="nombre"
                   class="w-full border px-3 py-2 rounded"
                   value="{{ old('nombre', $student->nombre) }}">
        </div>

        <div class="mb-3">
            <label class="block mb-1">Correo</label>
            <input type="email" name="correo"
                   class="w-full border px-3 py-2 rounded"
                   value="{{ old('correo', $student->correo) }}">
        </div>

        <div class="mb-3">
            <label class="block mb-1">Carrera</label>
            <select name="career_id" class="w-full border px-3 py-2 rounded">
                @foreach ($careers as $career)
                    <option value="{{ $career->id }}"
                        {{ $student->career_id == $career->id ? 'selected' : '' }}>
                        {{ $career->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Semestre</label>
            <input type="number" name="semestre"
                   class="w-full border px-3 py-2 rounded"
                   value="{{ old('semestre', $student->semestre) }}">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('students.index') }}" class="px-4 py-2 border rounded">
                Cancelar
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
