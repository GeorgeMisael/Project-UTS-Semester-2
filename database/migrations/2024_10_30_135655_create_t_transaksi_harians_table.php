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
        Schema::create('t_transaksi_harians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('no_records');
            $table->string('stock_code');
            $table->foreign('stock_code')->references('stock_code')->on('emiten')->onDelete('cascade');
            $table->date('date_transaction');
            $table->integer('open');
            $table->integer('high');
            $table->integer('low');
            $table->integer('close');
            $table->integer('change');
            $table->bigInteger('volume');
            $table->bigInteger('value');
            $table->integer('frequency');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_transaksi_harians');
    }
};
