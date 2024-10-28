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
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')
                ->on('tipos');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')
                ->on('cidades');

            $table->string('titulo');
            $table->string('descricao');
            $table->string('imagem');
            $table->enum('status', ['vende', 'aluga']);
            $table->string('endereco');
            $table->string('cep');
            $table->decimal('valor', 6, 2);
            $table->integer('dormitorios');
            $table->string('detalhes');
            $table->text('mapa')->nullable();
            $table->bigInteger('vizualizacoes')->default(0);
            $table->enum('publicar', ['sim', 'nao'])->default('nao');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imoveis');
    }
};
