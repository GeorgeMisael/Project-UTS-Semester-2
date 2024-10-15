<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('message_kategoris', function (Blueprint $table) {
            $table->string('no_mk', 30)->primary();
            $table->string('description', 50);
            $table->string('create_by', 50);
            $table->timestamps();
            $table->string('delete_mark', 1)->default('0');
            $table->string('update_by', 30);
        });
    }

    public function down()
    {
        Schema::dropIfExists('message_kategoris');
    }
};
