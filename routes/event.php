<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// 1 is user 
// 0 is admin


Route::middleware(['auth'])->group(function () {
    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::patch('/events/{event}', [EventController::class, 'update'])->name('events.update');
});

Route::middleware(['auth', '1'])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});


