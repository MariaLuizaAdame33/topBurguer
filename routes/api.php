<?php


use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutoController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

Route::get('/cliente', [ClientesController::class, 'cadastro']);
Route::post('/cliente', [ClientesController::class, 'store']);
