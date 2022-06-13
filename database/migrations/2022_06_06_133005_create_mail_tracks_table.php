<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('email_track_code')->unique();
            $table->string('email_subject')->nullable();
            $table->text('email_body')->nullable();
            $table->string('receiver_email')->nullable();
            $table->integer('group_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->dateTime('email_open_datetime ')->nullable();
            $table->tinyInteger('email_status ')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_tracks');
    }
};
