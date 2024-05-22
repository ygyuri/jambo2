<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Loop to create five admins
        for ($i = 1; $i <= 5; $i++) {
            // Create admin with sequential name and email
            $name = 'Admin' . $i;
            $email = 'admin' . $i . '@example.com';
            $password = 'password' . $i;

            Admin::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password), // Hash the password
            ]);
        }
    }
}