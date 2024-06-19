<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdventureController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Dashboard and Profile Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Adventure Routes
Route::middleware(['auth'])->prefix('adventures')->group(function () {
    Route::get('/create', [AdventureController::class, 'create'])->name('adventure.create');
    Route::post('/create', [AdventureController::class, 'store'])->name('adventure.store');
    Route::post('/{adventure}/join', [AdventureController::class, 'join'])->name('adventure.join');
    Route::post('/{adventure}/interest', [AdventureController::class, 'interest'])->name('adventure.interest');
    Route::delete('/{adventure}', [AdventureController::class, 'delete'])->name('adventure.delete');
});

// Chat Routes
Route::middleware(['auth'])->prefix('/profile/chats')->group(function () {
    Route::get('/', [ConversationController::class, 'index'])->name('chats');
    Route::get('/{conversation}', [ConversationController::class, 'show'])->name('chats.show');
    Route::post('/{conversation}', [MessageController::class, 'send'])->name('messages.send');
});

// Public Routes
Route::get('/', [AdventureController::class, 'index'])->name('home');
Route::get('/adventures/{adventure:title}', [AdventureController::class, 'detail'])->name('adventure');
Route::get('/users/{user:name}', [UserController::class, 'user'])->name('user');

require __DIR__.'/auth.php';

