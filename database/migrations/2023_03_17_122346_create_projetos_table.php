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
            $table->unsignedBigInteger('data_id');
            $table->unsignedBigInteger('instituicao_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('tipo_id');
            $table->timestamps();

            $table->foreign('data_id')->references('id')->on('data');
            $table->foreign('instituicao_id')->references('id')->on('instituicao');
            $table->foreign('area_id')->references('id')->on('area');
            $table->foreign('curso_id')->references('id')->on('curso');
            $table->foreign('tipo_id')->references('id')->on('tipo');
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