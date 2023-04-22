<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $postText;
    public $commentText;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $postText, $commentText)
    {
        $this->name = $name;
        $this->postText = $postText;
        $this->commentText = $commentText;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->name.' has commented on one of your posts!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'comments.email',
            with: ['name' => $this->name, 'postText' => $this->postText, 'commentText' => $this->commentText]
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
