<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::patch('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::patch('/events/{event}/update-status', [EventController::class, 'updateStatus']);
    Route::patch('/events/{event}/add-comment', [EventController::class, 'addComment']);
    Route::patch('/events/{id}/delete', [EventController::class, 'delete']);
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

});

// * Event History Route

Route::middleware(['auth'])->group(function () {
    Route::get('/history', [EventController::class, 'eventHistory'])->name('events.history');
});
