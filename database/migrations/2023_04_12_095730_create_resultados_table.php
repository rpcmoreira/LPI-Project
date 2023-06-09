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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_id');
            $table->string('descricao');
            $table->string('observacoes');
            $table->unsignedBigInteger('projeto_id');
            $table->unsignedBigInteger('file_id');

            $table->foreign('tipo_id')->references('id')->on('tipo_resultados');
            $table->foreign('projeto_id')->references('id')->on('projetos');
            $table->foreign('file_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
