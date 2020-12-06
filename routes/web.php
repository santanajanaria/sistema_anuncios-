<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdvertsController as AdvertsController;
use App\Http\Controllers\EstablishmentController as EstablishmentController;

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

//Estabelecimento
Route::prefix('establishment')->name('establishment.')->middleware('auth')->group(function () {
    Route::get('/', [EstablishmentController::class, 'index'])->name('index');
});

// anuncios
Route::prefix('adverts')->name('adverts.')->middleware('auth')->group(function(){
    Route::get('', [AdvertsController::class, 'index'])->name('index');
    Route::get('/form', [AdvertsController::class, 'create'])->name('form');
    Route::get('/edit', [AdvertsController::class, 'edit'])->name('edit');
    Route::post('/store', [AdvertsController::class, 'store'])->name('store');
    Route::put('/update', [AdvertsController::class, 'update'])->name('update');
});
