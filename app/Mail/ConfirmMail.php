<?php

namespace App\Mail;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Nette\Utils\Arrays;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;
    private Array $data;
    private $token ;
    
    /**
     * Create a new message instance.
     */
    public function __construct(Array $data,$token)
    {
        $this->data = $data;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('palacio.car@example.com', 'Palacio Car'),
            subject: 'Valide Réservation.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $verificationUrl = route('reservation.verify', $this->token);
        $checkstatus = route("reservation.status",$this->data['reservation']);
        return new Content(
            view: 'emails.confirm',
            with:[
                "data" => $this->data,
                "verificationUrl"=>$verificationUrl,
                "checkstatus" => $checkstatus
            ]
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
