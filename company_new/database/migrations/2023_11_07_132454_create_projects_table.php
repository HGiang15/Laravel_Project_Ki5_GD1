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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('P_No');
            $table->string('Name', 100);
            $table->string('Location', 255);
            $table->unsignedBigInteger('idDepartment');
            $table->unsignedBigInteger('idEmployee');
            
            $table->foreign('idDepartment')->references('D_No')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idEmployee')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
