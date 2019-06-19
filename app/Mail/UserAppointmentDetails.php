<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAppointmentDetails extends Mailable
{
    use Queueable, SerializesModels;

    protected $appointment;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {
        return $this->markdown('emails.appointment-details')
            ->subject('Your call in 30 minutes')
            ->with([
                'appointment' => $this->appointment,
            ]);
    }
}
