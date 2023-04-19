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
        Schema::create('admin', function (Blueprint $table) {
            $table->id('admin_id')->autoIncrement();
            $table->string('admin_fname',45);
            $table->string('admin_lname',45);
            $table->string('admin_email')->unique();
            $table->string('admin_username',45);
            $table->string('admin_password')->unique();
            $table->integer('admin_coll')->default('1');;
        });
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
};
