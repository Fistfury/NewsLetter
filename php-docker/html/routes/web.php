<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Auth\PasswordResetController;

// Manage user's own newsletters
Route::get('/newsletters/manage', [NewsletterController::class, 'manage'])
->name('newsletters.manage');

Route::get('/subscriptions/manage', [SubscriptionController::class, 'manage'])
->name('subscriptions.manage');

// List all newsletters
Route::get('/', [NewsletterController::class, 'index'])
->name('newsletters.index');

// Display create newsletter form
Route::get('/newsletters/create', [NewsletterController::class, 'create'])
->name('newsletters.create')
->middleware('auth');

// Store new newsletter
Route::post('/newsletters', [NewsletterController::class, 'store'])
->name('newsletters.store')
->middleware('auth');

// Show specific newsletter
Route::get('/newsletters/{newsletter}', [NewsletterController::class, 'show'])
->name('newsletters.show');

// Edit newsletter
Route::get('/newsletters/{newsletter}/edit', [NewsletterController::class, 'edit'])
->name('newsletters.edit')
->middleware('auth');

// Update newsletter
Route::put('/newsletters/{newsletter}', [NewsletterController::class, 'update'])
->name('newsletters.update')
->middleware('auth');

// Delete newsletter
Route::delete('/newsletters/{newsletter}', [NewsletterController::class, 'destroy'])
->name('newsletters.destroy')
->middleware('auth');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])
->middleware('guest')
->name('register');

// Create new user
Route::post('/users', [UserController::class, 'store'])
->name('users.store');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])
->middleware('guest')
->name('login');

// Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])
->middleware('auth')
->name('logout');

// Logout All
Route::post('/logout-all', [UserController::class, 'logoutAll'])
->middleware('auth')
->name('logout.all');

//Subscribe 
Route::post('/newsletters/{newsletterId}/subscribe', [SubscriptionController::class, 'subscribe'])
->middleware('auth')
->name('subscribe');

//Unsubscribe
Route::delete('/subscriptions/{subscriptionId}/unsubscribe', [SubscriptionController::class, 'unsubscribe'])
->middleware('auth')
->name('unsubscribe');

// Display the form to request a password reset link
Route::get('password/reset', [PasswordResetController::class, 'showLinkRequestForm'])
->name('password.request');

// Post a request for a password reset link
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])
->name('password.email');

// Show the password reset form
Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetForm'])
->name('password.reset');

// Post the new password
Route::post('password/reset', [PasswordResetController::class, 'reset'])
->name('password.update');