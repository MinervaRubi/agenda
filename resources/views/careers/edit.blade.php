@extends('layouts.app')

@section('title', 'Editar Carrera')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar Carrera</h1>

<form action="{{ route('careers.update', $career) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1 font-semibold">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $career->nombre) }}" class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Descripción</label>
        <textarea name="descripcion" class="w-full border rounded px-3 py-2" rows="3">{{ old('descripcion', $career->descripcion) }}</textarea>
    </div>

    <div class="flex justify-end space-x-2">
        <a href="{{ route('careers.index') }}" class="px-4 py-2 rounded border">Cancelar</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Actualizar
        </button>
    </div>
</form>
@endsection
