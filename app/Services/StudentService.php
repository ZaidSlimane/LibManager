<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function createStudent(array $data)
    {
        return Student::create($data);
    }

    public function updateStudent(Student $student, array $data)
    {
        $student->update($data);
        return $student;
    }

    public function deleteStudent(Student $student)
    {
        $student->delete();
    }

    public function getAllStudents()
    {
        return Student::all();
    }
    public function getStudentById(int $id)
    {
        return Student::findOrFail($id);
    }
}
