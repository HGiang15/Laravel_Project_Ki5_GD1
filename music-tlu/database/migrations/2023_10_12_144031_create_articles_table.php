<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('idArticle');
            $table->string('title', 200);
            $table->string('nameSong', 100);
            $table->unsignedInteger('idCategory',);
            $table->text('summary');
            $table->text('content')->nullable();
            $table->unsignedInteger('idAuthor');    
            $table->dateTime('dateW')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('imgArticle', 200)->nullable();
            $table->foreign('idCategory')->references('idCategory')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idAuthor')->references('idAuthor')->on('authors')->onUpdate('cascade')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
