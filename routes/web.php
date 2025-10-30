<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Master\DataPesertaController;
use App\Http\Controllers\Admin\Master\JenisController;
use App\Http\Controllers\Admin\Master\TipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin/')->name('admin.')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::prefix('master/')->name('master.')->group(function () {
        Route::resource('jenis-ujian', JenisController::class);
        Route::resource('tipe-ujian', TipeController::class);
        Route::resource('data-peserta', DataPesertaController::class);
    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
