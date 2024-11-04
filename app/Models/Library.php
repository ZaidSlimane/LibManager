<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // Corresponds to the 'name' column in the database
    ];

    /**
     * Relationship with Book model.
     * A library can have many books.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
