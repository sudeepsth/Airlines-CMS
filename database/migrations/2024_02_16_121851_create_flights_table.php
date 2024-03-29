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
            $table->unsignedBigInteger('from');
            $table->unsignedBigInteger('to');
            $table->foreign('from')
                    ->references('id')
                    ->on('destinations')
                    ->onUpdate('cascade');
            $table->foreign('to')
                    ->references('id')
                    ->on('destinations')
                    ->onUpdate('cascade');
            $table->timestamp('flight_date');
            $table->unsignedInteger('flight_time');
            $table->unsignedInteger('total_seats');
            $table->unsignedInteger('booked_seats')->default(0);
            $table->index('from');
            $table->index('to');

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
