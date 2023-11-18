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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('id');
            $table->string('Name', 100);
            $table->string('Address', 255);
            $table->string('Gender', 10);
            // $table->enum('Gender', ['Male', 'Female', 'Other'])->default('Other');
            $table->date('DateOfBirth');
            $table->date('DateOfJob');
            $table->unsignedBigInteger('idDepartment');
            
            $table->foreign('idDepartment')->references('D_No')->on('departments')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
