<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MassageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('frontend.pages.home');
// });

Route::get('/', [CarController::class, 'getCar'])->name('home.car');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [MassageController::class, 'index'])->name('contact');

Route::middleware(['auth',])->group(function () {
    Route::controller(CarController::class)->group(function () {
        Route::get('/cars', 'index')->name('cars');
        Route::get('/cars/create', 'create')->name('cars.create');
        Route::post('/cars/save', 'store')->name('cars.save');
        Route::get('/cars/edit/{car}', 'edit')->name('cars.edit');
        Route::put('/cars/update/{car}', 'update')->name('cars.update');
        Route::put('/cars/updateImage/{car}', 'updateImage')->name('cars.updateImage');
        Route::get('/cars/deleted/{car}', 'destroy')->name('cars.delete');
    });

    Route::controller(MassageController::class)->group(function () {
        Route::get('/massage', 'massage')->name('massage');
        Route::get('/massage/{massage}', 'destroy')->name('massage.delete');
    });
});

Route::middleware(['auth',])->group(function () {
    Route::controller(MassageController::class)->group(function () {
        Route::get('/massageSend', 'store')->name('massageSend');
    });

    Route::controller(CarController::class)->group(function () {
        Route::get('/detail/{car}', 'carDetails')->name('cars.detail');
    });
});
