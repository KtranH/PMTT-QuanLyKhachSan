<?php

namespace App\Mail\SendMail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Cancel_Room_Admin  extends Mailable
{
    use Queueable, SerializesModels;

    protected $customerEmail;
    protected $userName;
    protected $checkInDate;
    protected $checkOutDate;
    protected $roomTypeName;


    /**
     * Create a new message instance.
     *
     * @param  string  $customerEmail
     * @param  string  $userName
     * @param  string  $checkInDate
     * @param  string  $checkOutDate
     * @param  string  $roomTypeName
    
     * @return void
     */
    public function __construct($details)
    {
        $this->customerEmail = $details['customerEmail'];
        $this->userName = $details['userName'];
        $this->checkInDate = $details['checkInDate'];
        $this->checkOutDate = $details['checkOutDate'];
        $this->roomTypeName = $details['roomTypeName'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Khách sạn GTX - Hủy phòng',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('User.Email.cancel_room_admin')
            ->with([
                'customerEmail' => $this->customerEmail,
                'userName' => $this->userName,
                'checkInDate' => $this->checkInDate,
                'checkOutDate' => $this->checkOutDate,
                'roomTypeName' => $this->roomTypeName,
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
