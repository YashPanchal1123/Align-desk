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
        Schema::create('manager_master', function (Blueprint $table) {
            $table->id('M_id');  //auto increment
            $table->unsignedBigInteger('MLM_id'); //foreignkey
            $table->foreign('MLM_id')->references('MLM_id')->on('manager_login_master')->onDelete('cascade');
            $table->unsignedBigInteger('CEO_id');//foreignkey
            $table->foreign('CEO_id')->references('CEO_id')->on('ceo_master')->onDelete('cascade');
            $table->string('M_Name');
            $table->string('M_Department');
            $table->boolean('M_isActive');
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
        Schema::dropIfExists('manager_master');
    }
};
