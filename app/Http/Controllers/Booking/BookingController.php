<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller as Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class BookingController extends Controller
{

    const MAX_DAYS = 5;
    const START_TIME = 10;
    const HOURS_PER_DAY = 8;
    const SLOTS_PER_HOUR = 2;
    const MINUTE_INTERVAL = 30;

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

        for ($day = 0; $day < self::MAX_DAYS; $day++) {
            $date->add(1, 'day');

            $date->hour = self::START_TIME;

            $slots = new Collection;
            for ($slot = 0; $slot <= (self::HOURS_PER_DAY * self::SLOTS_PER_HOUR); $slot++) {
                if ($slot !== 0) {
                    $date->addMinutes(self::MINUTE_INTERVAL);
                }

                $time = $date->format('h:i A');
                $availability = false;

                foreach ($bookings as $booking) {
                    $bookingTime = Carbon::parse($booking->time);

                    if ($bookingTime->eq($date)) {
                        $time = $bookingTime->format('h:i A');
                        $availability = true;
                    } 
                }

                $slots->push([
                    'time' => $time,
                    'is_available' => $availability
                ]);

            }

            if ($date->isoWeekday() === 6) {
                $date->add(2, 'day');
            } else if ($date->isoWeekday() === 7) {
                $date->add(1, 'day');
            }   

            $days->push([
                'name' => $date->format("D"),
                'date' => $date->format("d/m/y"),
                'slots' => $slots
            ]);
        }

        return response()->json(
            $days
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
