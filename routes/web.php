<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ChallengeUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserMetricController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ManualActionController;
use App\Http\Controllers\HabitEvaluationController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AnalysisController;
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
    // Encuestas
    Route::get('survey', [SurveyController::class, 'form'])->name('survey.form');
    Route::post('survey', [SurveyController::class, 'submit'])->name('survey.submit');
    // Acciones manuales
    Route::resource('manual-actions', ManualActionController::class)->only(['index', 'create', 'store']);
    // Evaluación de hábitos
    Route::get('habit-evaluation', [HabitEvaluationController::class, 'form'])->name('habit_evaluation.form');
    Route::post('habit-evaluation', [HabitEvaluationController::class, 'submit'])->name('habit_evaluation.submit');
    // Panel admin
    Route::middleware('admin')->group(function () {
        Route::get('admin', [AdminPanelController::class, 'index'])->name('admin.index');
        Route::get('admin/reports/{user}', [ReportController::class, 'generateUserReport'])->name('admin.report.user');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('challenges', ChallengeController::class)->except(['index', 'show']);
    Route::post('challenges/{challenge}/complete', [ChallengeUserController::class, 'complete'])->name('challenges.complete');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('metrics/history', [UserMetricController::class, 'history'])->name('metrics.history');
});

Route::middleware(['auth'])->get('analysis', [AnalysisController::class, 'index'])->name('analysis.index');
Route::middleware(['auth'])->get('mi-reporte', [ReportController::class, 'downloadMyReport'])->name('user.report.download');

require __DIR__.'/auth.php';
