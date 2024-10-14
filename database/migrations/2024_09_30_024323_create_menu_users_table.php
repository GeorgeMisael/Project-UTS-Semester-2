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
        Schema::create('menu_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis_user')->nullable();
            $table->foreign('id_jenis_user')->references('id')->on('jenis_users');
            $table->unsignedBigInteger('id_menu')->nullable();
            $table->foreign('id_menu')->references('id')->on('menus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_users');
    }
};
