<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoteAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_answer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('answer');
            $table->unsignedBigInteger('uploader_id');
            $table->foreign('uploader_id')->references('id')->on('users');
            $table->integer('value');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_answer');
    }
}
