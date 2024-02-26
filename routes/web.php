<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/registroProducto', [App\Http\Controllers\HomeController::class, 'create'])->name('create');

// Route::include('prueba_prue.php');    

Route::get('/grafico', [App\Http\Controllers\HomeController::class, 'GraficoController@index'])->name('GraficoController@index');

