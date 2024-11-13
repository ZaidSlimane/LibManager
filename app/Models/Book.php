<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'author',
        'publication_date', // Updated attribute
        'nb_pages',
        'type',
    ];

    protected $casts = [
        'publication_date' => 'datetime', // Updated attribute
    ];


}
