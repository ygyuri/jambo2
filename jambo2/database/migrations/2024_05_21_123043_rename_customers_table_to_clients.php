<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::rename('clients', 'clients');
    }

    public function down()
    {
        Schema::rename('clients', 'clients');
    }
};