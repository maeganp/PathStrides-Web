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
        Schema::create('task_report', function (Blueprint $table) {
            $table->id('task_report_id')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('task_id');
            $table->string('report_text',100)->nullable();
            $table->string('report_image_url');
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('task_id')->references('task_id')->on('task');
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
        Schema::dropIfExists('task_report');
    }
};
