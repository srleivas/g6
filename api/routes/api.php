<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\SituacoesController;
use App\Http\Controllers\TarefasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::prefix('situacoes')
    ->controller(SituacoesController::class)
    ->group(function () {
        Route::get('', 'index');
        Route::put('{id}', 'salvar');
        Route::post('', 'salvar');
        Route::delete('{id}', 'excluir');
    });

Route::prefix('categorias')
    ->controller(CategoriasController::class)
    ->group(function () {
        Route::get('', 'index');
        Route::put('{id}', 'salvar');
        Route::post('', 'salvar');
        Route::delete('{id}', 'excluir');
    });

Route::prefix('tarefas')
    ->controller(TarefasController::class)
    ->group(function () {
        Route::get('', 'index');
        Route::put('{id}', 'salvar');
        Route::post('', 'salvar');
        Route::delete('{id}', 'excluir');
    });