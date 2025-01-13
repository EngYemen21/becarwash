<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class SubscriptionSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $userEmail;
    protected $userName='moahmmedd';
    public function __construct($userEmail)
    {
        //
        $this->userEmail=$userEmail;

    }
    // public function build()
    // {
    //     return $this->subject('تم الاشتراك بنجاح')
    //                 ->view('emails.subscription');
    //                 // ->with(['userName' => $this->userEmail]);
    // }
    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Subscription Success Mail',
    //         from: new Address('m.bander.it@gmail.com', 'Bander IT'),
    //         to: new Address($this->userEmail, $this->userName),
    //     );
    // }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.subscription',
            // with: [
            //     'userName' => $this->userName,

            // ],
            // tags: ['shipment'],
            // metadata: [
            //     'name' => $this->userName,
            // ],
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
