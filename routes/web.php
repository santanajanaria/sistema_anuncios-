<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Estabelecimento
Route::prefix('establishment')->group(function(){
    Route::get('/', [ClientProfileController::class, 'index'])->name('estabelecimento.index');
});

Route::prefix('adverts')->group(function(){
    Route::get('/', [ClientProfileController::class, 'index'])->name('publicacao.index');
});
