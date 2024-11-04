<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends User
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'employee_number', // Numéro d'employé
        'job_title',       // Titre du métier
    ];

    /**
     * Get the user associated with the employee.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // You can define additional methods or attributes here as necessary
}
