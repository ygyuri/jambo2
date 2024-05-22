<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Airport;

class AirportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data for airport seeding
        $airportData = [
            [
                'name' => 'Jomo Kenyatta International Airport',
                'city' => 'Nairobi',
                'country' => 'Kenya',
                'latitude' => -1.3192,
                'longitude' => 36.9273,
                'timezone' => 'Africa/Nairobi',
                'elevation' => 1624,
            ],
            [
                'name' => 'Moi International Airport',
                'city' => 'Mombasa',
                'country' => 'Kenya',
                'latitude' => -4.0348,
                'longitude' => 39.5945,
                'timezone' => 'Africa/Nairobi',
                'elevation' => 61,
            ],
            [
                'name' => 'Kisumu International Airport',
                'city' => 'Kisumu',
                'country' => 'Kenya',
                'latitude' => -0.0863,
                'longitude' => 34.7289,
                'timezone' => 'Africa/Nairobi',
                'elevation' => 1137,
            ],
            [
                'name' => 'Eldoret International Airport',
                'city' => 'Eldoret',
                'country' => 'Kenya',
                'latitude' => 0.4057,
                'longitude' => 35.2383,
                'timezone' => 'Africa/Nairobi',
                'elevation' => 2108,
            ],
            [
                'name' => 'Arusha Airport',
                'city' => 'Arusha',
                'country' => 'Tanzania',
                'latitude' => -3.3678,
                'longitude' => 36.6333,
                'timezone' => 'Africa/Dar_es_Salaam',
                'elevation' => 1389,
            ],
            [
                'name' => 'Kilimanjaro International Airport',
                'city' => 'Kilimanjaro',
                'country' => 'Tanzania',
                'latitude' => -3.4294,
                'longitude' => 37.0745,
                'timezone' => 'Africa/Dar_es_Salaam',
                'elevation' => 930,
            ],
            [
                'name' => 'Julius Nyerere International Airport',
                'city' => 'Dar es Salaam',
                'country' => 'Tanzania',
                'latitude' => -6.8751,
                'longitude' => 39.2026,
                'timezone' => 'Africa/Dar_es_Salaam',
                'elevation' => 61,
            ],
            [
                'name' => 'Entebbe International Airport',
                'city' => 'Entebbe',
                'country' => 'Uganda',
                'latitude' => 0.0426,
                'longitude' => 32.4435,
                'timezone' => 'Africa/Kampala',
                'elevation' => 1150,
            ],
            // Add more airports from other regions as needed

            [
                'name' => 'Addis Ababa Bole International Airport',
                'city' => 'Addis Ababa',
                'country' => 'Ethiopia',
                'latitude' => 8.9779,
                'longitude' => 38.7997,
                'timezone' => 'Africa/Addis_Ababa',
                'elevation' => 2355,
            ],
            [
                'name' => 'Cape Town International Airport',
                'city' => 'Cape Town',
                'country' => 'South Africa',
                'latitude' => -33.9681,
                'longitude' => 18.5972,
                'timezone' => 'Africa/Johannesburg',
                'elevation' => 46,
            ],
            [
                'name' => 'Sydney Kingsford Smith International Airport',
                'city' => 'Sydney',
                'country' => 'Australia',
                'latitude' => -33.9461,
                'longitude' => 151.1772,
                'timezone' => 'Australia/Sydney',
                'elevation' => 21,
            ],
            [
                'name' => 'Heathrow Airport',
                'city' => 'London',
                'country' => 'United Kingdom',
                'latitude' => 51.4695,
                'longitude' => -0.4474,
                'timezone' => 'Europe/London',
                'elevation' => 25,
            ],
            [
                'name' => 'Charles de Gaulle Airport',
                'city' => 'Paris',
                'country' => 'France',
                'latitude' => 49.0097,
                'longitude' => 2.5479,
                'timezone' => 'Europe/Paris',
                'elevation' => 118,
            ],
            [
                'name' => 'Frankfurt Airport',
                'city' => 'Frankfurt',
                'country' => 'Germany',
                'latitude' => 50.0333,
                'longitude' => 8.5706,
                'timezone' => 'Europe/Berlin',
                'elevation' => 111,
            ],
            [
                'name' => 'Dubai International Airport',
                'city' => 'Dubai',
                'country' => 'United Arab Emirates',
                'latitude' => 25.2528,
                'longitude' => 55.3644,
                'timezone' => 'Asia/Dubai',
                'elevation' => 62,
            ],
            [
                'name' => 'Singapore Changi Airport',
                'city' => 'Singapore',
                'country' => 'Singapore',
                'latitude' => 1.3644,
                'longitude' => 103.9915,
                'timezone' => 'Asia/Singapore',
                'elevation' => 22,
            ],
            [
                'name' => 'Tokyo Haneda Airport',
                'city' => 'Tokyo',
                'country' => 'Japan',
                'latitude' => 35.5494,
                'longitude' => 139.7798,
                'timezone' => 'Asia/Tokyo',
                'elevation' => 6,
            ],
            [
                'name' => 'Beijing Capital International Airport',
                'city' => 'Beijing',
                'country' => 'China',
                'latitude' => 40.0799,
                'longitude' => 116.6031,
                'timezone' => 'Asia/Shanghai',
                'elevation' => 35,
            ],
            [
                'name' => 'Los Angeles International Airport',
                'city' => 'Los Angeles',
                'country' => 'United States',
                'latitude' => 33.9425,
                'longitude' => -118.4081,
                'timezone' => 'America/Los_Angeles',
                'elevation' => 38,
            ],
            [
                'name' => 'John F. Kennedy International Airport',
                'city' => 'New York City',
                'country' => 'United States',
                'latitude' => 40.6413,
                'longitude' => -73.7781,
                'timezone' => 'America/New_York',
                'elevation' => 13,
            ],
            [
                'name' => 'Toronto Pearson International Airport',
                'city' => 'Toronto',
                'country' => 'Canada',
                'latitude' => 43.6777,
                'longitude' => -79.6248,
                'timezone' => 'America/Toronto',
                'elevation' => 173,
            ],
            [
                'name' => 'Rio de Janeiro/Galeão International Airport',
                'city' => 'Rio de Janeiro',
                'country' => 'Brazil',
                'latitude' => -22.8090,
                'longitude' => -43.2506,
                'timezone' => 'America/Sao_Paulo',
                'elevation' => 7,
            ],
            [
                'name' => 'Cairo International Airport',
                'city' => 'Cairo',
                'country' => 'Egypt',
                'latitude' => 30.1228,
                'longitude' => 31.4061,
                'timezone' => 'Africa/Cairo',
                'elevation' => 116,
            ],
            [
                'name' => 'King Abdulaziz International Airport',
                'city' => 'Jeddah',
                'country' => 'Saudi Arabia',
                'latitude' => 21.6700,
                'longitude' => 39.1669,
                'timezone' => 'Asia/Riyadh',
                'elevation' => 15,
            ],
            [
                'name' => 'Ninoy Aquino International Airport',
                'city' => 'Manila',
                'country' => 'Philippines',
                'latitude' => 14.5086,
                'longitude' => 121.0197,
            ]
        ];

        // Loop through the airport data and create records
        foreach ($airportData as $data) {
            Airport::create($data);
        }
    }
}