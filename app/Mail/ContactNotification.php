<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    // Pastikan ini public agar bisa diakses di template/content
    public $data;

    /**
     * Konstruktor harus menerima parameter $data dari Controller
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Mengatur Subjek Email
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Form: ' . $this->data['name'],
        );
    }

    /**
     * Mengatur Isi Email
     * Kita akan menggunakan 'htmlString' karena kamu menulis HTML langsung di sini
     */
    public function content(): Content
    {
        return new Content(
            htmlString: "
                <h3>Pesan Baru dari Website Portfolio</h3>
                <p><strong>Nama:</strong> {$this->data['name']}</p>
                <p><strong>Email:</strong> {$this->data['email']}</p>
                <p><strong>Pesan:</strong><br>" . nl2br(e($this->data['message'])) . "</p>
            ",
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
