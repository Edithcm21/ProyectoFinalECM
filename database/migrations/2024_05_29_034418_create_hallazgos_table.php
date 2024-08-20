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
        Schema::create('hallazgos', function (Blueprint $table) {
            $table->unsignedInteger('fk_muestreo');
            $table->foreign('fk_muestreo')->references('id_muestreo')->on('muestreos');
            $table->unsignedInteger('fk_residuos');
            $table->foreign('fk_residuos')->references('id_residuo')->on('residuos');
            
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hallazgos');
    }
};
