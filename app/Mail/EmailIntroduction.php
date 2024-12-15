<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailIntroduction extends Mailable
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
            subject: "{$this->name}, You’re Invited",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.email1', // This should match the Blade view filename (e.g., resources/views/emails/introduction.blade.php)
        );
    }

    public function build()
    {
        return $this
            ->subject("{$this->name}, You’re Invited")
            ->view('email.email1')
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