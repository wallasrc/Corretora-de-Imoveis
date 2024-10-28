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
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('imagem');
            $table->string('link')->nullable();
            $table->integer('ordem')->nullable();
            $table->enum('publicado', ['sim', 'nao'])->default('nao');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
