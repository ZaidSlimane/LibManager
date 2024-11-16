<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $subscribers = [];

    public function addSubscriber(User $user)
    {
        $this->subscribers[] = $user;
    }

    public function removeSubscriber(User $user)
    {
        $this->subscribers = array_filter(
            $this->subscribers,
            fn($subscriber) => $subscriber->id !== $user->id
        );
    }

    public function addBook(Book $book)
    {
        $this->notifySubscribers($book);
    }



    protected function notifySubscribers(Book $book)
    {
        foreach ($this->subscribers as $subscriber) {
            if (in_array($book->category, $subscriber->interests)) {
                $subscriber->update("A new book titled '{$book->title}' in your favorite category '{$book->category}' is now available!");
            }
        }
    }

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




 

