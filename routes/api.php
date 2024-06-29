<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('productos', ProductosController::class);

Route::post('/login', [ClienteController::class, 'login']);

Route::post('/register', [ClienteController::class, 'register']);