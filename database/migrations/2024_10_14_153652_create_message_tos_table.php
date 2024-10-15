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
        Schema::create('message_tos', function (Blueprint $table) {
            $table->uuid('no_record')->primary();
            $table->string('message_id', 255);
            $table->string('to', 50);
            $table->string('cc', 50);
            $table->string('create_by', 30);
            $table->timestamps();
            $table->string('delete_mark', 1)->default('0');
            $table->string('update_by', 30);
        });
    }

    public function down()
    {
        Schema::dropIfExists('message_tos');
    }
};
