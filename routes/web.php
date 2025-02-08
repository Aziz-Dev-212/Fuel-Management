<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\{FuelTypeController, ServiceController, CarController, FuelTransactionController, FuelStockController};


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('fuel_types', FuelTypeController::class)->only(['index']);
    Route::resource('services', ServiceController::class);
    Route::resource('cars', CarController::class);
    Route::resource('transactions', FuelTransactionController::class);
    Route::resource('stock', FuelStockController::class)->only(['index', 'update']);

    Route::get('/cars-by-service/{service}', function (App\Models\Service $service) {
        return $service->cars()->select('id', 'name', 'matricule')->get();
    });
});

require __DIR__ . '/auth.php';
