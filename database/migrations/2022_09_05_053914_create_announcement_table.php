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
        Schema::create('announcement', function (Blueprint $table) {
            $table->id('anns_id')->autoIncrement();
            $table->string('anns_title',45);
            $table->string('anns_desc',100);
            $table->string('anns_file_url',255);
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('admin_id')->on('admin');
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
        Schema::dropIfExists('announcement');
    }
};