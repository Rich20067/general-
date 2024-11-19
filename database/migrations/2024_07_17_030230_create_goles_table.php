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
        Schema::create('goles', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->integer('minuto');
            $table->unsignedBigInteger('jugador_codigo');
            $table->unsignedBigInteger('partido_codigo');
            $table->foreign('jugador_codigo')->references('id')->on('jugadores')->onDelete('cascade');
            $table->foreign('partido_codigo')->references('id')->on('partidos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goles');
    }
};
