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
        Schema::create('books', function (Blueprint $table) {
            $table->id('id');
            $table->string('code', 20);
            $table->string('title', 500);
            $table->string('author', 200);
            $table->unsignedBigInteger('idkategori');
            $table->timestamps();

            // Definisi Foreign Key
            $table->foreign('idkategori')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
