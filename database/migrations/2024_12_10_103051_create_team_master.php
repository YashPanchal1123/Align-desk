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
        Schema::create('team_master', function (Blueprint $table) {
            $table->id('t_id');//Auto-Increment Primary Key
            $table->integer('ceo_id');//References id in the CEO_Master Table (FK)
            $table->integer('m_id');//References id in the Manager_Master Table (FK)
            $table->string('t_name');
            $table->string('t_dept');
            $table->boolean('t_isactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_master');
    }
};
