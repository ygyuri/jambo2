<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminsSeeder;
use Database\Seeders\FlightsSeeder;
use Database\Seeders\BookingsSeeder;
use Database\Seeders\AirportsSeeder;
use Database\Seeders\SeatsSeeder;
use Database\Seeders\Flights_scheduleSeeder;
use Database\Seeders\AircraftsSeeder;
use Database\Seeders\PaymentsSeeder;
use Database\Seeders\ClientsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeders for each table
        $this->call([
            AdminsSeeder::class,
            FlightsSeeder::class,
            BookingsSeeder::class,
            AirportsSeeder::class,
            SeatsSeeder::class,
            Flights_scheduleSeeder::class,
            AircraftsSeeder::class,
            PaymentsSeeder::class,
            ClientsSeeder::class,
        ]);
    }
}