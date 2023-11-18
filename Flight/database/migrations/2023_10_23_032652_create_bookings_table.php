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
        Schema::create('bookings', function (Blueprint $table) {
            $table->unsignedInteger('idFlight');
            $table->string('idPassenger');
            
            // $table->primary(['idFlight', 'idPassenger']);
            
            $table->foreign('idFlight')->references('FlightNumber')->on('flights')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idPassenger')->references('EmailAddress')->on('passengers')->onUpdate('cascade')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
