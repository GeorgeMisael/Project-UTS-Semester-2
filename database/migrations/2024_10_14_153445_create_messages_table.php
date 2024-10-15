<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->uuid('message_id')->primary(); // Use UUID
            $table->string('sender', 30);
            $table->string('message_reference', 30);
            $table->string('subject', 300);
            $table->text('message_text');
            $table->string('message_status', 30);
            $table->string('no_mk', 30);
            $table->string('create_by', 30);
            $table->timestamps();
            $table->string('delete_mark', 1)->default('0');
            $table->string('update_by', 30);
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
