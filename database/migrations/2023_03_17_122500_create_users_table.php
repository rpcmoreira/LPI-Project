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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('tipo_id')->default(6);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('google_id')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->foreign('tipo_id')->references('id')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
