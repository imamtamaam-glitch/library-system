<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowingController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::resource('borrowings', BorrowingController::class)->only(['index', 'create', 'store']);
    Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');

    Route::middleware('can:manage-users')->group(function () {
        Route::resource('users', UserController::class);
    });

});