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
        Schema::create('task_comment', function (Blueprint $table) {
            $table->id('comment_id')->autoIncrement();
            $table->string('comment_text',255);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('task_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('task_id')->references('task_id')->on('task');
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
        Schema::dropIfExists('task_comment');
    }
};
