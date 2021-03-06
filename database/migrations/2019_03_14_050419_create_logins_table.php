<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('logins', function (Blueprint $table){
      $table->bigIncrements('id'); //primary key
      $table->string('email')->unique();
      $table->string('password');
      $table->unsignedBigInteger('role_id');
      $table->foreign('role_id')->references('id')->on('roles'); //taking the roleid in the roles table as  foreign key
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
        Schema::dropIfExists('logins');
    }
}
