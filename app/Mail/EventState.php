<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/* The `class EventState extends Mailable` is defining a new Mailable class called `EventState`. This
class extends the `Mailable` class provided by Laravel's mail system and allows for the creation of
email messages that can be sent to users. The `EventState` class has properties for a user, a
project, and a state, and methods for defining the message envelope, content, and attachments. The
constructor of the class takes a `User` object, a project ID, and a state ID as parameters, which
can be used to customize the email message. */
class EventState extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $projeto, $state;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user, int $projeto, int $state)
    {
        $this->user = $user;
        $this->projeto = $projeto;
        $this->state = $state;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Event State',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
