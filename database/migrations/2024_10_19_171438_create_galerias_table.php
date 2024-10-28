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
        Schema::create('galerias', function (Blueprint $table) {
            $table->id();
            $table->integer('imovel_id')->unsigned();
            $table->foreign('imovel_id')->references('id')->on('imoveis');
            $table->string('titulo')->nullable();
            $table->string('descricao')->nullable();
            $table->string('imagem');
            $table->string('ordem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galerias');
    }
};
