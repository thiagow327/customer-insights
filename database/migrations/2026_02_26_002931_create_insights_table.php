<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\CanalEnum;
use App\Enums\SentimentoEnum;
use App\Enums\RiscoEnum;
use App\Enums\StatusEnum;

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
            $table->enum('canal', array_column(CanalEnum::cases(), 'value'));
            $table->enum('sentimento', array_column(SentimentoEnum::cases(), 'value'));
            $table->enum('risco', array_column(RiscoEnum::cases(), 'value'));
            $table->string('problema');
            $table->enum('status', array_column(StatusEnum::cases(), 'value'));
            $table->timestamps();
            $table->softDeletes();
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
