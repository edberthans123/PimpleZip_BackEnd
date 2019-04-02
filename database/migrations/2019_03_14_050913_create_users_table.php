<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
          $table->bigIncrements('id'); //primary key
          $table->string('name');
          $table->string('date_of_birth');
          $table->string('gender');
          $table->string('address');
          $table->string('phone');
          $table->string('picture')->default("public/uploads/ProfilePicture/default.png"); //not required
          $table->unsignedBigInteger('login_id')->unsigned();
          $table->foreign('login_id')->references('id')->on('logins'); //foreign key from logins id table
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
        Schema::dropIfExists('users');
    }
}
