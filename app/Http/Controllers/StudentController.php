<?php

namespace App\Http\Controllers;

use App\Facades\StudentFacade;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = StudentFacade::getAllStudents();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|unique:students',
            'speciality' => 'required|string|max:255',
        ]);

        $student = StudentFacade::createStudent($validated);

        return response()->json($student);
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'speciality' => 'string|max:255',
        ]);

        $student = StudentFacade::updateStudent($student, $validated);

        return response()->json($student);
    }

    public function destroy(Student $student)
    {
        StudentFacade::deleteStudent($student);

        return response()->json(['success' => 'Student deleted successfully.']);
    }
}
