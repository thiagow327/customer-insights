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
        Schema::create('insights', function (Blueprint $table) {
            $table->id();
            $table->string('protocolo')->unique();
            $table->string('cliente');
            $table->enum('canal', ['voz', 'chat', 'email']);
            $table->enum('sentimento', ['positivo', 'negativo', 'neutro']);
            $table->enum('risco', ['baixo', 'médio', 'alto']);
            $table->string('problema');
            $table->enum('status', ['aberto', 'em_andamento', 'resolvido']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insights');
    }
};
