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
        Schema::create('message_dokumens', function (Blueprint $table) {
            $table->string('no_mdok', 255)->primary();
            $table->string('file', 255);
            $table->string('description', 150);
            $table->string('message_id', 255);
            $table->string('create_by', 30);
            $table->timestamps();
            $table->string('delete_mark', 1)->default('0');
            $table->string('update_by', 30);
        });
    }

    public function down()
    {
        Schema::dropIfExists('message_dokumens');
    }
};
