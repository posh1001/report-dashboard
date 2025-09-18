<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;

// Admin routes
Route::prefix('admin')->group(function () {

    // Show login form
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');

    // Handle login submission
    Route::post('login', [AdminController::class, 'login'])->name('admin.login.submit');

    // Protected routes for logged-in admins
    Route::middleware('auth:admin')->group(function () {

        // Admin dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Logout
        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});




Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/{report}', [ReportController::class, 'show'])->name('reports.show');


// Dashboard route protected by admin middleware
// Route::middleware('auth:admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard-page'); // create this Blade
//     });
// });

Route::get('/dashboard', function() {
    return view('dashboard-page');
});




Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/post-program', function() {
    return view('post-program-page');
})->middleware('auth')->name('post-program-page');


Route::get('/post-program/{id}', [SearchDropdown::class, 'show'])->name('post-program.show');




// Route::get('/', function () {
//     return view('welcome');
// });
