<?php

namespace App\Models;

class Student extends User
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        // Inherited fields from User model
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'student_id' => 'string',
    ];

    /**
     * Get the student's ID.
     *
     * @return string
     */
    public function getStudentId()
    {
        return $this->student_id;
    }
}
