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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('projeto_id');
            $table->tinyInteger('is_read')->default('0');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('projeto_id')->references('id')->on('projetos');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
