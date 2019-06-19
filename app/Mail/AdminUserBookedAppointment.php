<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Spatie\CalendarLinks\Link;

class AdminUserBookedAppointment extends Mailable
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
        $startTime = Carbon::parse($this->appointment->time);
        $endTime = Carbon::parse($this->appointment->time)->addMinutes(30);

        $link = Link::create(
            'Portfolio Website Appointment Call',
            $startTime,
            $endTime
        )->description('');

        $links = [
            'google' => $link->google(),
            'yahoo' => $link->yahoo(),
            'webOutlook' => $link->webOutlook(),
            'ics' => $link->ics(),
        ];

        return $this->markdown('emails.admin-appointment-booked')
            ->subject('New Appointment')
            ->with([
                'appointment' => $this->appointment,
                'links' => $links
            ])
            ->attachData($link->ics(), 'appointment.ics', [
                'mime' => 'text/calendar',
            ]);
    }
}
