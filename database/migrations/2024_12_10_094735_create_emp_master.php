<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emp_master', function (Blueprint $table) {
            $table->id('emp_id');//Auto-Increment Primary Key
            $table->unsignedBigInteger('empl_id');
            $table->foreign('empl_id')->references('empl_id')->on('emp_login_master')->onDelete('cascade');
            $table->integer('created_by_m_id');//References id in the Manager_Master tabel (FK)
            $table->integer('t_id');//References id in the Team_Master tabel (FK)
            $table->integer('emp_name');
            $table->integer('emp_dept');
            $table->boolean('emp_isactive');
            $table->string('emp_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_master');
    }
};
