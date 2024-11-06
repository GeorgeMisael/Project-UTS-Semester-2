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
        Schema::create('emiten', function (Blueprint $table) {
            $table->string('stock_code', 10)->primary();
            $table->string('nama_perusahaan', 255);
            $table->unsignedBigInteger('shared');
            $table->string('sektor', 50);
            $table->timestamps();  // Menyediakan kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emitens');
    }
};
