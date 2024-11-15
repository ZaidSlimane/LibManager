<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Subscriber; // Correct the namespace for Subscriber

class User extends Model implements Subscriber
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'interests', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'interests' => 'array', // Corrected cast for interests
    ];

    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class); // Fixed missing semicolon
    }

    public function employee()
    {
        return $this->hasOne(Employee::class); // Fixed missing semicolon
    }

    /**
     * Define the many-to-many relationship with Book model.
     */
    public function interestedBooks()
    {
        return $this->belongsToMany(Book::class, 'user_interested_books')
                    ->withTimestamps();
    }

    /**
     * Notify user about new book.
     */
    public function sendUpdateNotification($message)
    {
        echo "Notification for {$this->first_name}: $message\n";
    }
}
