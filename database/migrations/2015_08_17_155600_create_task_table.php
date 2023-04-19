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
        Schema::create('task', function (Blueprint $table) {
            $table->id('task_id')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->string('task_title',45);
            $table->string('task_desc',255);
            $table->smallInteger('points');
            $table->string('address',255);
            $table->string('lat');
            $table->string('lng');
            $table->string('status',255);
            $table->string('deadline',45);
            $table->timestamps();
          

            $table->foreign('user_id')->references('user_id')->on('users');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
};
