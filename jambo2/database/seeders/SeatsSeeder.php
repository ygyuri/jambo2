<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;
use App\Models\Flight;
use Illuminate\Support\Str;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all flights to associate seats with
        $flights = Flight::all();

        // Check if there are enough flights to create seats
        if ($flights->isEmpty()) {
            $this->command->info('No flights found. Please seed flights first.');
            return;
        }

        // Define sample seat classes and their prices
        $seatClasses = [
            'economy' => 100.00,
            'business' => 500.00,
            'first class' => 1000.00
        ];

        // Define the number of seats to create
        $numberOfSeats = 10;

        // Loop through to create and save seat records
        foreach (range(1, $numberOfSeats) as $i) {
            // Pick a random flight to associate with this seat
            $flight = $flights->random();

            // Pick a random seat class and corresponding price
            $seatClass = array_rand($seatClasses);
            $price = $seatClasses[$seatClass];

            // Create a new seat record
            Seat::create([
                'id' => (string) Str::uuid(), // Generating UUID for seat ID
                'seat_number' => 'S' . Str::padLeft($i, 3, '0'), // Generating seat number S001, S002, etc.
                'seat_class' => $seatClass,
                'availability_status' => 'available', // Default status as available
                'price' => $price,
                'flight_id' => $flight->id, // Associating the seat with a random flight
                'created_at' => now(), // Timestamps
                'updated_at' => now(),
            ]);
        }
    }
}