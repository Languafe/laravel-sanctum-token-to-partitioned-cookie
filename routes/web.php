<?php

use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/embed', function () {
    Log::debug('embed view hit');
    return view('embed');
})->name('embed');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/cookies', [CookieController::class, 'store'])
    ->withoutMiddleware(VerifyCsrfToken::class);

Route::middleware('auth')->group(function () {
    Route::post('/tokens', [ApiTokenController::class, 'store'])->name('tokens.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
