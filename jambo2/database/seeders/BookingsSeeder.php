<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Flight;
use App\Models\Seat;
use Illuminate\Support\Str;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch the first ten clients, flights, and seats for reference
        $clients = Client::take(10)->get();
        $flights = Flight::take(10)->get();
        $seats = Seat::take(10)->get();

        // Check if there are enough clients, flights, and seats
        if ($clients->count() < 10 || $flights->count() < 10 || $seats->count() < 10) {
            $this->command->info('Not enough clients, flights, or seats to create 10 bookings.');
            return;
        }

        // Define the data for booking seeding
        $bookingData = [];
        for ($i = 0; $i < 10; $i++) {
            $bookingData[] = [
                'client_id' => $clients[$i]->id,
                'flight_id' => $flights[$i]->id,
                'passenger_count' => 1,
                'seat_id' => $seats[$i]->id,
                'total_price' => 150.00,
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'booking_date' => now(),
                'booking_reference' => Str::uuid()->toString(),
                'notes' => 'Booking note ' . ($i + 1),
            ];
        }

        // Loop through the booking data and create records
        foreach ($bookingData as $data) {
            Booking::create($data);
        }
    }
}