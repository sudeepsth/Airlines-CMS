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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('airlines');
            $table->string('flight_code');
            $table->string('from');
            $table->string('to');
            $table->timestamp('flight_date');
            $table->unsignedInteger('flight_time');
            $table->unsignedInteger('total_seats');
            $table->unsignedInteger('booked_seat')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
