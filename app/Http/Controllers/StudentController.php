<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $attributes =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'fathername' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'course' => ['required', 'string', 'max:255'],

        ]);
        Student::create([
            'user_id' => auth()->id(),
            'name' => $attributes['name'],
            'fathername' => $attributes['fathername'],
            'email' => $attributes['email'],
            'course' => $attributes['course'],
        ]);

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        if (Auth::user()->hasRole('admin') || Auth::id() == $student->user_id) {
            return view('students.edit', compact('student'));
        }
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        if (Auth::user()->hasRole('admin') || Auth::id() == $student->user_id) {
            $student->update($request->all());
        }
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
