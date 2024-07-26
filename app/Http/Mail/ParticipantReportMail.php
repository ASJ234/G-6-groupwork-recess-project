<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class ParticipantReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    public $attempts;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($participant, $attempts)
    {
        $this->participant = $participant;
        $this->attempts = $attempts;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Challenge Report',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.report',
            with: [
                'participant' => $this->participant,
                'attempts' => $this->attempts,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        $pdf = Pdf::loadView('pdf.report', [
            'participant' => $this->participant,
            'attempts' => $this->attempts,
        ]);

        return [
            Attachment::fromData(fn () => $pdf->output(), 'report.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
