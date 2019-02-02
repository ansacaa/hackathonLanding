<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('lastname', 100);
            $table->string('email', 100);
            $table->string('phone', 100);
            $table->string('school', 100);
            $table->string('major', 100);
            $table->string('level', 100);
            $table->integer('expected')->unsigned();
            $table->string('gender', 100);
            $table->string('race', 100);
            $table->date('birthdate');
            $table->string('file', 250);
            $table->timestamps();

            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
