<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SubscriptionController;

// List all newsletters
Route::get('/', [NewsletterController::class, 'index'])->name('newsletters.index');

// Display create newsletter form
Route::get('/newsletters/create', [NewsletterController::class, 'create'])->name('newsletters.create')->middleware('auth');

// Store new newsletter
Route::post('/newsletters', [NewsletterController::class, 'store'])->name('newsletters.store')->middleware('auth');

// Show specific newsletter
Route::get('/newsletters/{newsletter}', [NewsletterController::class, 'show'])->name('newsletters.show');

// Edit newsletter
Route::get('/newsletters/{newsletter}/edit', [NewsletterController::class, 'edit'])->name('newsletters.edit')->middleware('auth');

// Update newsletter
Route::put('/newsletters/{newsletter}', [NewsletterController::class, 'update'])->name('newsletters.update')->middleware('auth');

// Delete newsletter
Route::delete('/newsletters/{newsletter}', [NewsletterController::class, 'destroy'])->name('newsletters.destroy')->middleware('auth');

// Manage user's own newsletters
Route::get('/newsletters/manage', [NewsletterController::class, 'manage'])->name('newsletters.manage');

