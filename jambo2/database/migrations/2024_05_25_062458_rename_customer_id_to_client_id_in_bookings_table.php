<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Manually rename the column using a raw SQL query with ALGORITHM=INPLACE
        DB::statement('ALTER TABLE bookings CHANGE customer_id client_id INT, ALGORITHM=INPLACE');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // You can define the reverse operation if needed
        DB::statement('ALTER TABLE bookings CHANGE client_id customer_id INT, ALGORITHM=INPLACE');
    }
};