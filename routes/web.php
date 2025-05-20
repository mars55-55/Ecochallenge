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
use App\Models\User;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Rutas autenticadas para usuarios normales
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('topics', TopicController::class);
    // Solo index y show para todos los usuarios autenticados
    Route::resource('challenges', ChallengeController::class)->only(['index', 'show']);
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
    // Rutas de administración de retos solo para admin (crear, editar, eliminar)
    Route::middleware('is.admin')->group(function () {
        Route::get('challenges/create', [ChallengeController::class, 'create'])->name('challenges.create');
        Route::post('challenges', [ChallengeController::class, 'store'])->name('challenges.store');
        Route::get('challenges/{challenge}/edit', [ChallengeController::class, 'edit'])->name('challenges.edit');
        Route::put('challenges/{challenge}', [ChallengeController::class, 'update'])->name('challenges.update');
        Route::delete('challenges/{challenge}', [ChallengeController::class, 'destroy'])->name('challenges.destroy');
    });
    // Evaluación de hábitos
    Route::get('habit-evaluation', [HabitEvaluationController::class, 'form'])->name('habit_evaluation.form');
    Route::post('habit-evaluation', [HabitEvaluationController::class, 'submit'])->name('habit_evaluation.submit');
    Route::get('habit-evaluation/result', function() {
        $carbon = request('carbon', 0);
        return view('habit_evaluations.result', compact('carbon'));
    })->name('habit_evaluation.result');
    // Métricas y análisis
    Route::get('metrics/history', [UserMetricController::class, 'history'])->name('metrics.history');
    Route::get('analysis', [AnalysisController::class, 'index'])->name('analysis.index');
    Route::get('mi-reporte', [ReportController::class, 'downloadMyReport'])->name('user.report.download');
    Route::get('admin', [AdminPanelController::class, 'index'])->name('admin.index');
    Route::get('admin/users', [AdminPanelController::class, 'users'])->name('admin.users');
    Route::patch('admin/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('admin/reports', [ReportController::class, 'index'])->name('admin.reports');
    Route::get('admin/reports/{user}', [ReportController::class, 'generateUserReport'])->name('admin.report.user');
    Route::delete('topics/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::get('admin/surveys/create', [\App\Http\Controllers\SurveyController::class, 'create'])->name('survey.create');
    Route::post('admin/surveys', [\App\Http\Controllers\SurveyController::class, 'store'])->name('survey.store');
});

// Panel admin (solo para administradores)
// Las rutas admin solo deben ser accesibles por frontend si el usuario es admin
// Todas las rutas admin deben ir DENTRO del grupo autenticado para evitar 404
// Route::get('admin', [AdminPanelController::class, 'index'])->name('admin.index');
// Route::get('admin/users', [AdminPanelController::class, 'users'])->name('admin.users');
// Route::patch('admin/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update');
// Route::delete('admin/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('admin.users.destroy');
// Route::get('admin/reports', [ReportController::class, 'index'])->name('admin.reports');
// Route::get('admin/reports/{user}', [ReportController::class, 'generateUserReport'])->name('admin.report.user');
// Route::delete('topics/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');
// Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
// Route::get('admin/surveys/create', [\App\Http\Controllers\SurveyController::class, 'create'])->name('survey.create');
// Route::post('admin/surveys', [\App\Http\Controllers\SurveyController::class, 'store'])->name('survey.store');

require __DIR__.'/auth.php';
