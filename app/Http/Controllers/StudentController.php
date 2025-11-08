<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('career')->orderBy('nombre')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $careers = Career::orderBy('nombre')->get();
        return view('students.create', compact('careers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'correo'    => 'required|email|unique:students,correo',
            'career_id' => 'required|exists:careers,id',
            'semestre'  => 'required|integer',
        ]);

        Student::create([
            'nombre'    => $request->nombre,
            'correo'    => $request->correo,
            'career_id' => $request->career_id,
            'semestre'  => $request->semestre,
        ]);

        return redirect()->route('students.index')
                         ->with('success', 'Estudiante registrado correctamente.');
    }

    // 👇 EDITAR
    public function edit(Student $student)
    {
        $careers = Career::orderBy('nombre')->get();
        return view('students.edit', compact('student', 'careers'));
    }

    // 👇 ACTUALIZAR
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'correo'    => 'required|email|unique:students,correo,' . $student->id,
            'career_id' => 'required|exists:careers,id',
            'semestre'  => 'required|integer',
        ]);

        $student->update([
            'nombre'    => $request->nombre,
            'correo'    => $request->correo,
            'career_id' => $request->career_id,
            'semestre'  => $request->semestre,
        ]);

        return redirect()->route('students.index')
                         ->with('success', 'Estudiante actualizado correctamente.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
                         ->with('success', 'Estudiante eliminado correctamente.');
    }
}
