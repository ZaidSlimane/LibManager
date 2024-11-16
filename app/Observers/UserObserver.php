<?php

namespace App\Observers;

use App\Models\Book;
use App\Services\UserService;

class UserObserver
{
    protected $userService;
    protected $subscribers = [];

    /**
     * UserObserver constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Fetch users interested in a specific category.
     *
     * @param string $interest
     * @return void
     */
    public function fetchSubscribersByInterest(string $interest)
    {
        $this->subscribers = $this->userService->fetchUserByInterest($interest);
    }

    /**
     * Notify all subscribers about the new book.
     *
     * @param Book $book
     * @return array
     */
    public function notifySubscribers(Book $book): array
    {
        // Fetch subscribers who have an interest in the book's category
        $this->fetchSubscribersByInterest($book->category);

        $notifiedUsers = [];
        foreach ($this->subscribers as $subscriber) {
            #$this->sendNotification($subscriber, $book);
            $notifiedUsers[] = $subscriber->only(['id', 'first_name', 'last_name', 'email']);
        }

        return $notifiedUsers;
    }


}
