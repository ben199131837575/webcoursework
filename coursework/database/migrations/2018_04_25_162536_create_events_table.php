<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64);
            $table->string('description', 255);
            $table->dateTime('dateandtime');
            $table->unsignedInteger('likes');
            $table->enum('type', ['sport', 'culture', 'other']);
            $table->string('tag', 64);
            $table->binary('picture');
            $table->string('location', 128);
            $table->unsignedInteger('organiserid');
            $table->foreign('organiserid')->references('id')->on('users');
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
        Schema::dropIfExists('events');
    }
}
