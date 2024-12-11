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
        Schema::create('project_task_master', function (Blueprint $table) {
            $table->id('ptm_id');//Auto-Increment Primary Key
            $table->date('P_duration');
            $table->date('P_task_duration');
            $table->string('p_task_name');
            $table->string('P_task_description');
            $table->date('p_isstart');
            $table->date('p_iscompleted');
            $table->boolean('p_isactive');
            $table->string('p_remarks')->nullable();
            $table->unsignedBigInteger('ptc_emp_id');
            $table->foreign('ptc_emp_id')->references('emp_id')->on('emp_master')->onDelete('cascade');//References id in the Employee Table (FK)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_task_master');
    }
};
