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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('descricao', 2000);
            $table->string('responsavel', 200);
            $table->date('data_criacao');
            $table->date('data_prevista');
            $table->date('data_finalizacao')->nullable();
            $table->integer('situacao_id');
            $table->integer('categoria_id');

            $table->foreign('situacao_id')->references('id')->on('situacoes');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('tarefas');
    }
};
