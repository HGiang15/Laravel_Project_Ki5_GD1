<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('airplanes', function (Blueprint $table) {
            $table->increments('RegistrationNumber');
            $table->string('ModeNumber');
            $table->unsignedBigInteger('Capacity');
            // $table->timestamps();    
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('airplanes');
    }
};
