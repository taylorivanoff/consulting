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

    const MAX_DAYS = 5;
    const START_TIME = 9;
    const HOURS_PER_DAY = 8;
    const MINUTE_INTERVAL = 60;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = new Collection;

        $cursor = Carbon::today();
        $maxDate = Carbon::today();
        $maxDate->addWeekdays(5);

        while (($cursor->diffInDays($maxDate)) > 0) {
            $slots = new Collection;

            $maxHour = $cursor->copy();
            $maxHour->hour = 9;

            while (($cursor->diffInHours($maxHour)) > 0) {
                $id = null;
                $time = $cursor->format('g:i a');
                $available = false;

                // $bookings = Booking::all();

                // foreach ($bookings as $booking) {
                //     $bookingTime = Carbon::parse($booking->time);

                //     if ($bookingTime->eq($cursor)) {
                //         $id = $booking->id;
                //         $time = $bookingTime->format('g:i a');
                //         $available = true;
                //     }
                // }

                $slots->push([
                    'id' => $id,
                    'time' => $time,
                    'available' => $available
                ]);

                $cursor->addMinutes(self::MINUTE_INTERVAL);
            }

            $days->push([
                'name' => $cursor->format("l"),
                'date' => $cursor->format("d/m/y"),
                'slots' => $slots
            ]);

            $cursor->addWeekday();
        }







        // while ($cursor->diffInDays($maxDate)) {
        //     $cursor->addWeekday();

        //     $cursor->hour = self::START_TIME;

        //     $maxHour = Carbon::now()->startOfDay();
        //     $maxHour->addHours(17);
        //     $slots = new Collection;

        //     while ($cursor->diffInHours($maxHour)) {
        //         $cursor->addMinutes(self::MINUTE_INTERVAL);

        //         $id = null;
        //         $time = $cursor->format('g:i a');
        //         $available = false;

        //         $bookings = Booking::all();

        //         foreach ($bookings as $booking) {
        //             $bookingTime = Carbon::parse($booking->time);

        //             if ($bookingTime->eq($cursor)) {
        //                 $id = $booking->id;
        //                 $time = $bookingTime->format('g:i a');
        //                 $available = true;
        //             }
        //         }

        //         $slots->push([
        //             'id' => $id,
        //             'time' => $time,
        //             'available' => $available
        //         ]);
        //     }
                
        //     $days->push([
        //         'name' => $cursor->format("l"),
        //         'date' => $cursor->format("d/m/y"),
        //         'slots' => $slots
        //     ]);
        // }

        return response()->json($days);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

        $booking = Booking::find($validated['booking'])->firstOrFail();

        $lead = Lead::firstOrCreate([
            'email' => $validated['email']
        ]);

        $appointment = Appointment::create([
            'name' => $validated['name'],
            'email' => $lead->email,
            'phone' => $validated['phone'],
            'time' => $booking->time,
        ]);

        $later = Carbon::parse($booking->time)->subtract('minutes', 30);

        Mail::to($lead->email)
            ->queue(new UserBookedAppointment($appointment));

        Mail::to(User::role('admin')->get())
            ->queue(new AdminUserBookedAppointment($appointment));

        Mail::to($lead->email)
            ->later($later, new UserAppointmentDetails($appointment));

        $booking->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
