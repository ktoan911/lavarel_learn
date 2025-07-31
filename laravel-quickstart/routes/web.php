<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LanguageController;
Route::get('/language/{language}', [LanguageController::class, 'changeLanguage'])->name('language.change');

Route::get('/', function () {
        return view('welcome');
    });

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::middleware('admin', 'auth')->group(function () {
    Route::get('user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::resource('tasks', TaskController::class);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'localization'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';