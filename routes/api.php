<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ProdutoController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::prefix('v1')->namespace('Api')->group(function(){
    //Produtos
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');


    //Categorias
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
});

