<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::resource('books', BookController::class);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/members', [MemberController::class, 'index']);

Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('books', BookController::class);

    Route::middleware('can:manage-users')->group(function () {
        Route::resource('users', UserController::class);
    });

});