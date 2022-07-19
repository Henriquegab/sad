<?php

use App\Http\Controllers\sadController;
use App\Http\Controllers\sadRiscoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('escolha');
})->name('inicio');

Route::get('/incerteza-parte1', function () {
    return view('incerteza.parte1');
})->name('incerteza.parte1');

Route::get('/risco-parte1', function () {
    return view('risco.parte1');
})->name('risco.parte1');

Route::post('/incerteza-parte2', [sadController::class, 'create'])->name('incerteza.parte2');
Route::post('/incerteza-parte3', [sadController::class, 'parte3create'])->name('incerteza.parte3');
Route::post('/incerteza-tabela', [sadController::class, 'tabela'])->name('incerteza.tabela');

Route::post('/risco-parte2', [sadRiscoController::class, 'index'])->name('risco.parte2');
