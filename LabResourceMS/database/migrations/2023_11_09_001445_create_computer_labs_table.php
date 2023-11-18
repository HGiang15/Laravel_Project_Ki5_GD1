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
        Schema::create('computer_labs', function (Blueprint $table) {
            $table->increments('LabID');
            $table->string('LabName', 255);
            $table->integer('NumberOfComputers');
            $table->string('Status', 50);
            $table->text('Description');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_labs');
    }
};
