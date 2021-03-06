<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->bigIncrements('id'); //primary key
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('consultant_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users'); //foreign key in users table
            $table->foreign('consultant_id')->references('id')->on('consultants'); //foreign key in consultants table
            $table->string('message');
            $table->integer('rating');
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
        Schema::dropIfExists('feedback');
    }
}
