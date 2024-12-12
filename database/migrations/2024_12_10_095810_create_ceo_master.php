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
        Schema::create('ceo_master', function (Blueprint $table) {
            $table->id('CEO_id');  //auto increment
            $table->unsignedBigInteger('CEOL_id');   //foreignkey
            $table->foreign('CEOL_id')->references('CEOL_Id')->on('ceo_login_master')->onDelete('cascade');
            $table->string('CEO_Name');
            $table->boolean('CEO_isActive');
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
        Schema::dropIfExists('ceo_master');
    }
};
