<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class ContactResponse extends Mailable
{
    use Queueable, SerializesModels;

    public $contacts;

    /**
     * Tạo một instance mới của thông điệp.
     *
     * @param Contact $contacts
     */
    public function __construct(Contact $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * Lấy thông tin envelope của thư.
     */
    public function envelope(): Envelope
    {
        // Lấy email của người dùng đang đăng nhập (admin)
        $adminEmail = Auth::user()->email;

        return new Envelope(
            subject: 'Phản hồi từ chúng tôi',
            from: new \Illuminate\Mail\Mailables\Address($adminEmail, 'Admin Support')
        );
    }

    /**
     * Lấy nội dung thông điệp.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_response', // Đường dẫn đến view Blade
            with: [
                'name' => $this->contacts->name,
                'response' => $this->contacts->response, // Lấy phản hồi từ đối tượng Contact
                'contacts' => $this->contacts, // Truyền đúng đối tượng
            ]
        );
    }

    /**
     * Lấy các tệp đính kèm cho thư.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; // Nếu cần đính kèm file, thêm logic tại đây
    }
}
