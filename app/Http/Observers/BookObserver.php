<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Book;

class UserObserver
{
    public function updated(User $user)
    {
        // Check if the interestedBooks relationship has been modified
        if ($user->wasChanged('interestedBooks')) {
            // Fetch the newly added book
            $newBooks = $user->interestedBooks()->latest()->first();

            // Notify the user about the new book in their list
            if ($newBooks) {
                $user->notify(new \App\Notifications\NewInterestedBookNotification($newBooks));
            }
        }
    }
}
