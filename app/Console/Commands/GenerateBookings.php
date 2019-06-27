<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class GenerateBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a weekly bid of random bookings.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $times = [
            9,
            11,
            13, 
            15, 
            17
        ];

        $today = Carbon::today();

        for ($i = 0; $i < 5; $i++) {
            $random = mt_rand(3, 5);

            for ($j = 0; $j < $random; $j++) {
                $key = array_rand($times, 1);
                $today->hour = $times[$key];

                Booking::create([
                    'time' => $today
                ]);
            }

            $today->addDay();
        }
    }
}
