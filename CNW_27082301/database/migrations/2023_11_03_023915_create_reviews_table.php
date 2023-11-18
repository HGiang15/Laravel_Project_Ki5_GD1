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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('ReviewID');
            $table->unsignedBigInteger('BookID');
            $table->unsignedBigInteger('UserID');
            $table->integer('Rating');
            $table->text('ReviewText');
            $table->date('ReviewDate');

            $table->foreign('BookID')->references('BookID')->on('books')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('UserID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
