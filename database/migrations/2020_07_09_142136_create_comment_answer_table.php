<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_answer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('answer');
            $table->unsignedBigInteger('uploader_id');
            $table->foreign('uploader_id')->references('id')->on('users');
            $table->string('content');
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
        Schema::dropIfExists('comment_answer');
    }
}
