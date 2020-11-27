<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\StoreBookingRequest;
use App\Mail\AdminUserBookedAppointment;
use App\Mail\UserAppointmentDetails;
use App\Mail\UserBookedAppointment;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = new Collection;

        $cursor = Carbon::today();

        if ($cursor->isWeekend()) {
            $cursor->startOfWeek()->addWeek(1);
        }

        $maxDate = $cursor->copy()->addWeekdays(6);

        while (($cursor->diffInDays($maxDate)) > 0) {
            $slots = new Collection;

            $cursor->hour = 9;
            $maxHour = $cursor->copy()->addHours(10);

            while (($cursor->diffInMinutes($maxHour)) > 0) {
                $time = $cursor->format('g:i a');
                $available = true;

                foreach (Appointment::all() as $appointment) {
                    $appointmentTime = Carbon::parse($appointment->time);

                    if ($cursor->eq($appointmentTime)) {
                        $time = $appointmentTime->format('g:i a');
                        $available = false;
                    }
                }

                $slots->push([
                    'datetime' => $cursor->toDateTimeString(),
                    'time' => $time,
                    'is_available' => $available
                ]);

                $cursor->addHours(2);
            }

            $days->push([
                'name' => $cursor->format("l"),
                'date' => $cursor->format("d/m/y"),
                'slots' => $slots
            ]);

            $cursor->addWeekday();
        }

        return response()->json($days);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        $validated = $request->validated();

        $lead = Lead::firstOrCreate([
            'email' => $validated['email']
        ]);

        $appointment = Appointment::create([
            'name' => $validated['name'],
            'email' => $lead->email,
            'phone' => $validated['phone'],
            'time' => $validated['booking']['datetime'],
        ]);

        Mail::to($lead->email)->send(new UserBookedAppointment($appointment));
    }
}
