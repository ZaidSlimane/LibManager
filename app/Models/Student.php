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
     'user_id',
     'student_id',
     'speciality',
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
