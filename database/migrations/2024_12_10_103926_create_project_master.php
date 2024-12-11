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
        Schema::create('project_master', function (Blueprint $table) {
            $table->id('p_id');//Auto-Increment Primary Key
            $table->string('p_name');
            $table->string('p_description');
            $table->integer('m_id');//References id in the Manager_Master Table (FK)
            $table->unsignedBigInteger('ptm_id');//References id in the project_task__Master Table (FK)
            $table->foreign('ptm_id')->references('ptm_id')->on('project_task_master')->onDelete('cascade');
            $table->unsignedBigInteger('t_id');//References id in the team_Master Table (FK)
            $table->foreign('t_id')->references('t_id')->on('team_master')->onDelete('cascade');
            $table->boolean('t_isactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_master');
    }
};
