<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
    ];

    /**
     * Relationship to User.
     * Assuming that a `user_id` foreign key is used in the lends table.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to Books.
     * Assuming a lend can have many books (many-to-many relationship).
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}