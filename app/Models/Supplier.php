<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',                    
        'address',                  
        'commercial_register_number', 
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
