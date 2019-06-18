<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
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
        $data = new Collection;

        foreach (Booking::withTrashed()->cursor() as $booking) {
            $date = Carbon::parse($booking->time);

            if ($booking->trashed()) {
                $data->push([
                    'id' => $booking->id,
                    'title' => 'Unavailable',
                    'start' => $date->format('Y-m-d\TH:i:s'),
                    'end' => $date->format('Y-m-d\TH:i:s'),
                    'overlap' => false,
                ]);
            } else { 
                $data->push([
                    'id' => $booking->id,
                    'title' => 'Available',
                    'start' => $date->format('Y-m-d\TH:i:s'),
                    'end' => $date->format('Y-m-d\TH:i:s'),
                    'overlap' => false,
                    'rendering' => 'background',
                ]);
            }
        }

        return response()->json($data);
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
        $startDate = Carbon::parse($request->start);
        $endDate = Carbon::parse($request->end);

        while ($startDate < $endDate) {
            $booking = Booking::firstOrCreate([
                'time' => $startDate
            ]);

            $startDate->addMinutes(60);
        }

        $data = new Collection;

        foreach (Booking::withTrashed()->cursor() as $booking) {
            $date = Carbon::parse($booking->time);

            if ($booking->trashed()) {
                $data->push([
                    'id' => $booking->id,
                    'title' => 'Unavailable',
                    'start' => $date->format('Y-m-d\TH:i:s'),
                    'end' => $date->format('Y-m-d\TH:i:s'),
                    'overlap' => false,
                ]);
            } else { 
                $data->push([
                    'id' => $booking->id,
                    'title' => 'Available',
                    'start' => $date->format('Y-m-d\TH:i:s'),
                    'end' => $date->format('Y-m-d\TH:i:s'),
                    'overlap' => false,
                    'rendering' => 'background',
                ]);
            }
        }

        return response()->json($data);
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
