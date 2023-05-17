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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id')->autoIncrement();
            $table->string('user_fname',45);
            $table->string('user_mname',45)->nullable();
            $table->string('user_lname',45);
            $table->string('user_email')->unique();
            $table->string('contactnumber');
            $table->string('user_username',45);
            $table->string('user_password',255);
            $table->integer('user_points');
            $table->string('role');
            $table->string('status');
            $table->string('user_lat')->nullable();
            $table->string('user_long')->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->string('dep_name');
            $table->integer('emp_coll')->default('1');
            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
};
