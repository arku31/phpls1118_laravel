<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BooksCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    private $book;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($book)
    {
        //
        $this->book = $book;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.bookCreated', ['book' => $this->book]);
    }
}
