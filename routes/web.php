<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return view('dashboard');
    }
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('topics', TopicController::class);
    Route::post('topics/{topic}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('topics/{topic}/reactions', [ReactionController::class, 'store'])->name('reactions.store');
    Route::post('topics/{topic}/report', [ReportController::class, 'store'])->name('topics.report');
    Route::post('comments/{comment}/reactions', [ReactionController::class, 'storeComment'])->name('comments.reactions.store');
    Route::post('comments/{comment}/report', [ReportController::class, 'storeComment'])->name('comments.report');
});

require __DIR__.'/auth.php';
