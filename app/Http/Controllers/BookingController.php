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
        // $times = BookingDateTime::all();
        // $availability = array();
        // $configs = Configuration::with('timeInterval')->first();
        // foreach($times as $t) {
        //     $startDate = date_create($t['booking_datetime']);
        //     $endDate = date_create($t['booking_datetime']);

        //     // Get configuration variable
        //     // @todo default metric is minutes and only one supported
        //     // change to whichever metrics we support in the future
        //     $timeToAdd = $configs->timeInterval->interval; //minutes
        //     $endDate = $endDate->add(new \DateInterval('PT'.$timeToAdd.'M'));
        //     $event = [
        //         'id' => $t['id'],
        //         'title' => 'Available',
        //         'start' => $startDate->format('Y-m-d\TH:i:s'),
        //         'end' => $endDate->format('Y-m-d\TH:i:s'),
        //         'overlap' => false,
        //         'rendering' => 'background',
        //     ];
        //     array_push($availability, $event);
        // }
        // return response()->json($availability); 

        // get start and end date from request
        // loop through bookings
        // add new Booking with interval added

        // create collection from availability
        $startDate = Carbon::parse($request->start);
        $endDate = Carbon::parse($request->end);

        $bookings = new Collection;

        $cursorDate = $startDate;

        for ($cursorDate; $cursorDate <= $endDate; $cursorDate->addMinutes(30)) {
            Booking::firstOrCreate([
                'time' => $cursorDate
            ]);


            // $bookings->push([
            //     'id' => $t['id'],
            //     'title' => 'Available',
            //     'start' => $startDate->format('Y-m-d\TH:i:s'),
            //     'end' => $endDate->format('Y-m-d\TH:i:s'),
            //     'overlap' => false,
            //     'rendering' => 'background',
            // ]);
        }

        return response()->json($bookings);
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
