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
        Schema::create('dependents', function (Blueprint $table) {
            $table->string('D_name', 100);
            $table->string('Gender', 10);
            // $table->enum('Gender', ['Male', 'Female', 'Other'])->default('Other');
            $table->string('Relationship', 100);
            $table->unsignedBigInteger('idEmployee');
            
            $table->foreign('idEmployee')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependents');
    }
};
