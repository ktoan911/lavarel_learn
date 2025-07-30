<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\CheckAdmin;

Auth::loginUsingId(1);

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/index', [UserController::class, 'index'])->name('user.index');
Route::get('user/create', [UserController::class, 'create'])->name('user.create')
    -> middleware("admin");
Route::get('user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('user/{user}', [UserController::class, 'show'])->name('user.show');
Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');


Route::resource('/task', TaskController::class);