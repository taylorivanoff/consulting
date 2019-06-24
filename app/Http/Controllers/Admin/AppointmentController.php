<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class AppointmentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   
        $upcoming = new Collection;

        foreach (Appointment::latest()->cursor() as $appointment) {
            $date = Carbon::parse($appointment->time);

            $upcoming->push([
                'id' => $appointment->id,
                'title' => "{$appointment->name}",
                'url' => "tel:{$appointment->phone}",
                'start' => $date->format('Y-m-d\TH:i:s'),
                'end' => $date->format('Y-m-d\TH:i:s'),
            ]);
        }

        return response()->json($upcoming);
    }
}
