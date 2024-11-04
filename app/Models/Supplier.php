<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supplier extends User
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',                    // Phone number
        'address',                  // Address
        'commercial_register_number', // Commercial register number
    ];

    /**
     * Get the user associated with the supplier.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Other methods and attributes can go here
}
