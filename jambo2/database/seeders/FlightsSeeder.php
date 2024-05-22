<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flight;
use App\Models\Airport;
use App\Models\Aircraft; // Import the Aircraft model
use Illuminate\Support\Str;

class FlightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all airports
        $airports = Airport::all();

        // Fetch all aircrafts
        $aircrafts = Aircraft::all();

        // Check if there are enough airports and aircrafts to create flights
        if ($airports->count() < 2) {
            $this->command->info('Not enough airports to create flights.');
            return;
        }

        if ($aircrafts->isEmpty()) {
            $this->command->info('No aircrafts available to create flights.');
            return;
        }

        // Define the data for flight seeding
        $flightData = [
            [
                'flight_number' => 'KQ100',
                'departure_time' => '2024-06-01 08:00:00',
                'arrival_time' => '2024-06-01 10:00:00',
                'duration' => '2h 0m',
                'price' => 150.00,
                'status' => 'scheduled',
                'available_seats' => 150,
            ],
            [
                'flight_number' => 'KQ101',
                'departure_time' => '2024-06-01 12:00:00',
                'arrival_time' => '2024-06-01 14:00:00',
                'duration' => '2h 0m',
                'price' => 200.00,
                'status' => 'scheduled',
                'available_seats' => 100,
            ],
            [
                'flight_number' => 'KQ102',
                'departure_time' => '2024-06-01 15:00:00',
                'arrival_time' => '2024-06-01 17:00:00',
                'duration' => '2h 0m',
                'price' => 180.00,
                'status' => 'delayed',
                'available_seats' => 120,
            ],
            [
                'flight_number' => 'KQ103',
                'departure_time' => '2024-06-02 09:00:00',
                'arrival_time' => '2024-06-02 11:00:00',
                'duration' => '2h 0m',
                'price' => 220.00,
                'status' => 'scheduled',
                'available_seats' => 130,
            ],
            [
                'flight_number' => 'KQ104',
                'departure_time' => '2024-06-02 13:00:00',
                'arrival_time' => '2024-06-02 15:00:00',
                'duration' => '2h 0m',
                'price' => 250.00,
                'status' => 'canceled',
                'available_seats' => 0,
            ],
            [
                'flight_number' => 'KQ105',
                'departure_time' => '2024-06-03 08:30:00',
                'arrival_time' => '2024-06-03 10:30:00',
                'duration' => '2h 0m',
                'price' => 230.00,
                'status' => 'scheduled',
                'available_seats' => 90,
            ],
            [
                'flight_number' => 'KQ106',
                'departure_time' => '2024-06-03 11:00:00',
                'arrival_time' =>'2024-06-03 13:00:00',
                'duration' => '2h 0m',
                'price' => 200.00,
                'status' => 'scheduled',
                'available_seats' => 110,
            ],
            [
                'flight_number' => 'KQ107',
                'departure_time' => '2024-06-03 16:00:00',
                'arrival_time' => '2024-06-03 18:00:00',
                'duration' => '2h 0m',
                'price' => 240.00,
                'status' => 'delayed',
                'available_seats' => 100,
            ],
            [
                'flight_number' => 'KQ108',
                'departure_time' => '2024-06-04 07:00:00',
                'arrival_time' => '2024-06-04 09:00:00',
                'duration' => '2h 0m',
                'price' => 210.00,
                'status' => 'scheduled',
                'available_seats' => 80,
            ],
            [
                'flight_number' => 'KQ109',
                'departure_time' => '2024-06-04 12:30:00',
                'arrival_time' => '2024-06-04 14:30:00',
                'duration' => '2h 0m',
                'price' => 220.00,
                'status' => 'scheduled',
                'available_seats' => 100,
            ],
        ];

        // Loop through the flight data and create records
        foreach ($flightData as $data) {
            // Randomly select different airports for departure and arrival
            do {
                $departureAirport = $airports->random();
                $arrivalAirport = $airports->random();
            } while ($departureAirport->id === $arrivalAirport->id); // Ensure departure and arrival airports are not the same

            // Randomly select an aircraft
            $aircraft = $aircrafts->random();

            Flight::create([
                'id' => (string) Str::uuid(),
                'flight_number' => $data['flight_number'],
                'departure_airport_id' => $departureAirport->id,
                'arrival_airport_id' => $arrivalAirport->id,
                'departure_time' => $data['departure_time'],
                'arrival_time' => $data['arrival_time'],
                'duration' => $data['duration'],
                'aircraft_id' => $aircraft->id, // Use a valid aircraft_id
                'price' => $data['price'],
                'status' => $data['status'],
                'available_seats' => $data['available_seats'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}