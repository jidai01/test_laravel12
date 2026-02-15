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
            <div style='font-family: sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;'>
                <div style='background: linear-gradient(135deg, #3b82f6 0%, #a855f7 100%); padding: 20px; text-align: center;'>
                    <h2 style='color: #ffffff; margin: 0; font-size: 20px;'>New Inquiry Received</h2>
                </div>
                <div style='padding: 30px; background-color: #ffffff;'>
                    <p style='color: #64748b; font-size: 14px; margin-bottom: 25px;'>Seseorang baru saja mengirimkan pesan melalui formulir kontak di portfolio Anda. Berikut detailnya:</p>
                    
                    <table style='width: 100%; border-collapse: collapse;'>
                        <tr>
                            <td style='padding: 10px 0; color: #94a3b8; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; width: 80px;'>Sender</td>
                            <td style='padding: 10px 0; color: #1e293b; font-weight: bold;'>{$this->data['name']}</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px 0; color: #94a3b8; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;'>Email</td>
                            <td style='padding: 10px 0;'><a href='mailto:{$this->data['email']}' style='color: #3b82f6; text-decoration: none;'>{$this->data['email']}</a></td>
                        </tr>
                        <tr>
                            <td style='padding: 10px 0; color: #94a3b8; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; vertical-align: top;'>Message</td>
                            <td style='padding: 10px 0; color: #334155; line-height: 1.6; background: #f8fafc; padding: 15px; border-radius: 8px;'>
                                " . nl2br(e($this->data['message'])) . "
                            </td>
                        </tr>
                    </table>
                </div>
                <div style='background-color: #f1f5f9; padding: 15px; text-align: center; font-size: 12px; color: #94a3b8;'>
                    Pesan ini dikirim otomatis oleh sistem Portfolio AI Anda.
                </div>
            </div>
        ",
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
