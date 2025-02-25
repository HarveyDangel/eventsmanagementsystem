<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\feedbackController;



// ! user route '1'

Route::middleware(['auth', '1'])->group(function () {
   Route::get('/feedbacks/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
   Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');
});


// ! admin route '0'

Route::middleware(['auth', '0'])->group(function () {
   Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
   Route::get('/feedbacks/{feedback}/edit', [FeedbackController::class, 'edit'])->name('feedbacks.edit');
   Route::patch('/feedbacks/{feedback}', [FeedbackController::class, 'update'])->name('feedbacks.update');
   Route::delete('/feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
});
