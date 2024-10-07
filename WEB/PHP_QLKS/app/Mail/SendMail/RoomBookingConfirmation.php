<?php

namespace App\Mail\SendMail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RoomBookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $customerEmail;
    protected $userName;
    protected $checkInDate;
    protected $checkOutDate;


    /**
     * Create a new message instance.
     *
     * @param  string  $customerEmail
     * @param  string  $userName
     * @param  string  $checkInDate
     * @param  string  $checkOutDate
    
     * @return void
     */
    public function __construct($details)
    {
        $this->customerEmail = $details['customerEmail'];
        $this->userName = $details['userName'];
        $this->checkInDate = $details['checkInDate'];
        $this->checkOutDate = $details['checkOutDate'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Khách sạn GTX - Xác nhận đặt phòng',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('User.Email.booking_confirmation')
            ->with([
                'customerEmail' => $this->customerEmail,
                'userName' => $this->userName,
                'checkInDate' => $this->checkInDate,
                'checkOutDate' => $this->checkOutDate,
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
