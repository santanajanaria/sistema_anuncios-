<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\AdvertsController as AdvertsController;
use App\Http\Controllers\EstablishmentController as EstablishmentController;
use App\Http\Controllers\LegalNatureController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('/')->name('home')->middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index']);
});

Route::prefix('legal_nature')->name('legalNatures.')->middleware('auth')->group(function () {
    Route::get('/form', [LegalNatureController::class, 'create'])->name('form');
    Route::post('/store', [LegalNatureController::class, 'store'])->name('store');
    Route::put('/{id}/update', [LegalNatureController::class, 'update'])->name('update');
});

//Estabelecimento
Route::prefix('perfil')->name('perfil.')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'perfil'])->name('index');
    Route::get('/{id}/form', [HomeController::class, 'create'])->name('form');
    Route::post('/store/{id}', [HomeController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [HomeController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [HomeController::class, 'update'])->name('update');
    Route::get('/{id}/show', [HomeController::class, 'show'])->name('show');
    Route::get('/{id}/remove', [HomeController::class, 'remove'])->name('remove');
});

// anuncios
Route::prefix('adverts')->name('adverts.')->middleware('auth')->group(function () {
    Route::get('', [AdvertsController::class, 'index'])->name('index');
    Route::get('/form', [AdvertsController::class, 'create'])->name('form');
    Route::post('/store', [AdvertsController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AdvertsController::class, 'edit'])->name('edit');
    Route::get('/{id}/show', [AdvertsController::class, 'show'])->name('show');
    Route::get('/{id}/remove', [AdvertsController::class, 'remove'])->name('remove');
    Route::get('/removed', [AdvertsController::class, 'removed'])->name('removed');
    Route::get('/{id}/restore', [AdvertsController::class, 'restore'])->name('restore');
    Route::put('/{id}/update', [AdvertsController::class, 'update'])->name('update');
});
