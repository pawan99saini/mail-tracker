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
        Schema::create('email_schedulers', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->nullable();
            $table->string('email_subject',100)->nullable();
            $table->integer('group_id');
            $table->integer('template_id');
            $table->dateTime('schedule_time');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('email_schedulers');
    }
};
