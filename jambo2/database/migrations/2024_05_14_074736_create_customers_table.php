<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Primary Key

            $table->string('name'); // Name of the client
            $table->string('email')->unique(); // Email address of the client
            $table->string('password'); // Encrypted password of the client
            $table->rememberToken(); // Remember token for "remember me" functionality

            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the clients table if it exists
        Schema::dropIfExists('clients');
    }
};