<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ReclamacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('productos', ProductosController::class);

Route::resource('reclamos', ReclamacionController::class);

Route::post('/login', [ClienteController::class, 'login']);

Route::get('/cliente', [ClienteController::class,'index']);

Route::get('/clientes/{id}', [ClienteController::class, 'show']);

Route::post('/register', [ClienteController::class, 'register']);