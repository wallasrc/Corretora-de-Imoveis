
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
        if (!Schema::hasTable('papels')) {
            Schema::create('papels', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('descricao');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('papel_permissao')) {

            Schema::create('papel_permissao', function (Blueprint $table) {
                $table->integer('permissao_id')->unsigned();
                $table->integer('papel_id')->unsigned();

                $table->foreign('permissao_id')->references('id')->on('permissaos')->onDelete('cascade');
                $table->foreign('papel_id')->references('id')->on('papels')->onDelete('cascade');

                $table->primary(['permissao_id', 'papel_id']);
            });
        }

        if (!Schema::hasTable('papel_user')) {

            Schema::create('papel_user', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->integer('papel_id')->unsigned();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('papel_id')->references('id')->on('papels')->onDelete('cascade');

                $table->primary(['user_id', 'papel_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papels');
    }
};
