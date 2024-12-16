<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LastCall extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The recipient's name.
     *
     * @var string
     */
    public $name;

    /**
     * The recipient's niche.
     *
     * @var string
     */
    public $niche;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $niche
     */
    public function __construct($name, $niche)
    {
        $this->name = $name;
        $this->niche = $niche;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Last Chance to Join the Beta Program, {$this->name}",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.email4', 
        );
    }

    public function build()
    {
        return $this
            ->subject("Last Chance to Join the Beta Program, {$this->name}")
            ->view('email.email4')
            ->with([
                'name' => $this->name,
                'niche' => $this->niche,
            ])
            ->attach(public_path('images/email-image.png'), [
                'as' => 'email-image.png',
                'mime' => 'image/png',
            ]);
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