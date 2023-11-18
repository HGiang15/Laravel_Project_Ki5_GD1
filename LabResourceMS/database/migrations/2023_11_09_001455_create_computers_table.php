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
        Schema::create('computers', function (Blueprint $table) {
            $table->increments('ComputerID');
            $table->unsignedInteger('LabID');
            $table->string('ComupterName', 255);
            $table->text('Configuration');
            $table->string('ComputerStatus', 50);

            $table->foreign('LabID')->references('LabID')->on('computer_labs')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
