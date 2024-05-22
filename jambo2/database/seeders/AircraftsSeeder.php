<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aircraft;

class AircraftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data for aircraft seeding
        $aircraftData = [
            [
                'name' => 'Boeing 737',
                'manufacturer' => 'Boeing',
                'registration_number' => 'N12345',
                'sitting_capacity' => 189,
            ],
            [
                'name' => 'Airbus A320',
                'manufacturer' => 'Airbus',
                'registration_number' => 'N54321',
                'sitting_capacity' => 150,
            ],
            [
                'name' => 'Embraer E190',
                'manufacturer' => 'Embraer',
                'registration_number' => 'N67890',
                'sitting_capacity' => 114,
            ],
            [
                'name' => 'Boeing 747',
                'manufacturer' => 'Boeing',
                'registration_number' => 'N98765',
                'sitting_capacity' => 416,
            ],
            [
                'name' => 'Airbus A380',
                'manufacturer' => 'Airbus',
                'registration_number' => 'N24680',
                'sitting_capacity' => 555,
            ],
            // Add more aircraft data as needed
        ];

        // Loop through the aircraft data and create records
        foreach ($aircraftData as $data) {
            Aircraft::create($data);
        }
    }
}