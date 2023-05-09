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
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('proponente_id')->nullable();
            $table->unsignedBigInteger('coordenador_id')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('metodos')->nullable();
            $table->unsignedBigInteger('data_id')->nullable();
            $table->unsignedBigInteger('data_final_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->unsignedBigInteger('estudo_id')->nullable();
            $table->unsignedBigInteger('estado_id')->default(5)->nullable();
            $table->timestamps();

            $table->foreign('proponente_id')->references('id')->on('users');
            $table->foreign('coordenador_id')->references('id')->on('users');
            $table->foreign('data_id')->references('id')->on('data');
            $table->foreign('data_final_id')->references('id')->on('data');
            $table->foreign('area_id')->references('id')->on('area');
            $table->foreign('estudo_id')->references('id')->on('estudos');
            $table->foreign('estado_id')->references('id')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};
