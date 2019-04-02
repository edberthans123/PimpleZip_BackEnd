<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('consultants', function (Blueprint $table) {
          $table->bigIncrements('id'); //primary key
          $table->string('name');
          $table->string('date_of_birth');
          $table->string('gender');
          $table->string('address');
          $table->string('phone');
          $table->string('picture')->default("public/uploads/ProfilePicture/default.png"); //not required
          $table->unsignedBigInteger('login_id');
          $table->foreign('login_id')->references('id')->on('logins'); //login id from logins table
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
        Schema::dropIfExists('consultant');
    }
}
