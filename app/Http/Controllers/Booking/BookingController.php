<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller as Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return available booking times that are able to be booked

        $days = new Collection;
        $date = Carbon::now()->startOfDay();

        for ($day = 0; $day < 5; $day++) {
            $date->add(1, 'day');

            if ($date->isoWeekday() === 6) {
                $date->add(2, 'day');
            }

            if ($date->isoWeekday() === 7) {
                $date->add(1, 'day');
            }   
            
            $hours = new Collection;
            for ($hour = 10; $hour <= 18; $hour++) {
                $date->hour = $hour;

                $hours->push([
                    'time' => $date->format('h:i A'),
                    'is_available' => false
                ]);
            }

            $days->push([
                'name' => $date->format("D"),
                'date' => $date->format("d/m/y"),
                'hours' => $hours
            ]);
        }

        $bookings = Booking::all();
        $times = new Collection;

        foreach ($bookings as $booking) {
            $date = Carbon::parse($booking->time);

            $hours = new Collection;
            $hours->push([
                'time' => $date->format('h:i A'),
                'is_available' => true
            ]);

            $times->push([
                'name' => $date->format("D"),
                'date' => $date->format("d/m/y"),
                'hours' => $hours
            ]);    
        }

        return response()->json(
            $times->merge($days)
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
