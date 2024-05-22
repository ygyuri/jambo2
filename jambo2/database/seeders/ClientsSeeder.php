<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the number of clients you want to seed
        $numberOfClients = 10;

        // Loop through to create and save clients
        for ($i = 1; $i <= $numberOfClients; $i++) {
            $client = new Client();
            $client->name = 'Client' . $i;
            $client->email = 'client' . $i . '@example.com';
            $client->password = Hash::make('password' . $i); // Hash the password
            $client->save();
        }
    }
}