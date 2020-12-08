<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdvertsController as AdvertsController;
use App\Http\Controllers\EstablishmentController as EstablishmentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

//Estabelecimento
Route::prefix('establishment')->name('establishment.')->middleware('auth')->group(function () {
    Route::get('/', [EstablishmentController::class, 'index'])->name('index');
});

// anuncios
Route::prefix('adverts')->name('adverts.')->middleware('auth')->group(function () {
    Route::get('', [AdvertsController::class, 'index'])->name('index');
    Route::get('/form', [AdvertsController::class, 'create'])->name('form');
    Route::post('/store', [AdvertsController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AdvertsController::class, 'edit'])->name('edit');
    Route::get('/{id}/show', [AdvertsController::class, 'show'])->name('show');
    Route::get('/{id}/remove', [AdvertsController::class, 'remove'])->name('remove');
    Route::put('/{id}/update', [AdvertsController::class, 'update'])->name('update');
});
