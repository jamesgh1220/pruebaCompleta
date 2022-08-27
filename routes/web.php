<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\CategoryCitaController;
use App\Http\Controllers\StateCitaController;

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
    return view('citas.index');
});

Route::resource('citas', CitasController::class);
Route::resource('category_citas', CategoryCitaController::class);
Route::resource('state_citas', StateCitaController::class);

