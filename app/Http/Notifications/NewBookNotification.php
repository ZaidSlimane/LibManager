<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Book;

class NewBookNotification extends Notification
{
    use Queueable;

    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line("A new book titled '{$this->book->title}' has been added to your list!")
                    ->action('View Book', url('/books/' . $this->book->id))
                    ->line('Enjoy your new addition!');
    }
}
