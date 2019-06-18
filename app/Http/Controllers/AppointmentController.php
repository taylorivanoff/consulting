<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Appointment;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

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
        $bookings = Booking::all();

        $days = new Collection;

        $date = Carbon::now()->startOfDay();
        $current = Carbon::now();
        
        for ($day = 0; $day < self::MAX_DAYS; $day++) {
            if ($day !== 0) {
                $date->add(1, 'day');
            }

            $date->hour = self::START_TIME;

            $slots = new Collection;
            for ($slot = 0; $slot <= (self::HOURS_PER_DAY * (60 / self::MINUTE_INTERVAL)); $slot++) {
                if ($slot !== 0) {
                    $date->addMinutes(self::MINUTE_INTERVAL);
                }

                $time = $date->format('h:i A');
                $availability = false;
                $id = null;

                foreach ($bookings as $booking) {
                    $bookingTime = Carbon::parse($booking->time);
                    
                    if ($bookingTime->eq($date)) {
                        if ($bookingTime->gt($current)) {
                            $time = $bookingTime->format('h:i A');
                            $id = $booking->id;
                            $availability = true;
                        }
                    }
                }

                $slots->push([
                    'id' => $id,
                    'time' => $time,
                    'is_available' => $availability,
                ]);
            }

            if ($date->isoWeekday() === 6) {
                $date->add(2, 'day');
            }

            if ($date->isoWeekday() === 7) {
                $date->add(1, 'day');
            }   

            $days->push([
                'name' => $date->format("l"),
                'date' => $date->format("d/m/y"),
                'slots' => $slots
            ]);
        }

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

        $appointment = Appointment::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'time' => $booking->time,
        ]);

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
