<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [EventController::class, 'welcome'])->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth','1', 'verified'])->name('dashboard');

// ! admin dashboard route
Route::middleware(['auth', '0'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});
// ! user dashboard route
Route::middleware(['auth', '1'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';

require __DIR__ . '/event.php';

require __DIR__ . '/feedback.php';
