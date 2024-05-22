<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Support\Str;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all bookings to associate with payments
        $bookings = Booking::all();

        // Define sample payment methods
        $paymentMethods = ['Credit Card', 'PayPal', 'Bank Transfer', 'Cash'];

        // Check if there are enough bookings to create payments
        if ($bookings->count() < 10) {
            $this->command->info('Not enough bookings to create 10 payments. Please seed bookings first.');
            return;
        }

        // Loop through to create and save payment records
        foreach ($bookings->take(10) as $booking) {
            Payment::create([
                'booking_id' => $booking->id,
                'amount' => rand(100, 1000), // Random amount between 100 and 1000
                'payment_method' => $paymentMethods[array_rand($paymentMethods)], // Random payment method
                'status' => 'completed',
                'transaction_id' => Str::uuid()->toString(), // Unique transaction ID
                'payment_date' => now(), // Current date and time
            ]);
        }
    }
}