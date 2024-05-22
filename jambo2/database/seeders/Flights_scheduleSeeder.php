<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FlightSchedule;
use App\Models\Flight; // Import the Flight model
use Illuminate\Support\Str;

class Flights_scheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all flights to associate flight schedules with
        $flights = Flight::all();

        // Check if there are enough flights to create flight schedules
        if ($flights->isEmpty()) {
            $this->command->info('No flights found. Please seed flights first.');
            return;
        }

        // Define the data for flight schedule seeding
        $flightScheduleData = [
            [
                'departure_time' => '2024-06-01 08:00:00',
                'arrival_time' => '2024-06-01 10:00:00',
                'status' => 'scheduled',
            ],
            [
                'departure_time' => '2024-06-01 12:00:00',
                'arrival_time' => '2024-06-01 14:00:00',
                'status' => 'scheduled',
            ],
            [
                'departure_time' => '2024-06-01 15:00:00',
                'arrival_time' => '2024-06-01 17:00:00',
                'status' => 'delayed',
            ],
            [
                'departure_time' => '2024-06-02 09:00:00',
                'arrival_time' => '2024-06-02 11:00:00',
                'status' => 'scheduled',
            ],
            [
                'departure_time' => '2024-06-02 13:00:00',
                'arrival_time' => '2024-06-02 15:00:00',
                'status' => 'canceled',
            ],
            [
                'departure_time' => '2024-06-03 08:30:00',
                'arrival_time' => '2024-06-03 10:30:00',
                'status' => 'scheduled',
            ],
            [
                'departure_time' => '2024-06-03 11:00:00',
                'arrival_time' => '2024-06-03 13:00:00',
                'status' => 'scheduled',
            ],
            [
                'departure_time' => '2024-06-03 16:00:00',
                'arrival_time' => '2024-06-03 18:00:00',
                'status' => 'delayed',
            ],
            [
                'departure_time' => '2024-06-04 07:00:00',
                'arrival_time' => '2024-06-04 09:00:00',
                'status' => 'scheduled',
            ],
            [
                'departure_time' => '2024-06-04 12:30:00',
                'arrival_time' => '2024-06-04 14:30:00',
                'status' => 'scheduled',
            ],
            // Add more flight schedules as needed
        ];

        // Loop through the flight schedule data and create records
        foreach ($flightScheduleData as $index => $data) {
            // Pick a random flight to associate with this flight schedule
            $flight = $flights->get($index % $flights->count()); // Ensure cyclic selection of flights

            // Create a new flight schedule record
            FlightSchedule::create([
                'id' => (string) Str::uuid(), // Generating UUID for flight schedule ID
                'flight_id' => $flight->id, // Associating the flight schedule with a flight
                'departure_time' => $data['departure_time'],
                'arrival_time' => $data['arrival_time'],
                'status' => $data['status'],
                'created_at' => now(), // Timestamps
                'updated_at' => now(),
            ]);
        }
    }
}