<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin-only routes
Route::middleware(['auth', 'role:' . User::ROLE_ADMIN])->group(function () {
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
});

// Staff-only routes
Route::middleware(['auth', 'role:' . User::ROLE_STAFF])->group(function () {
    Route::get('/staff/dashboard', fn() => view('staff.dashboard'))->name('staff.dashboard');
});

// Resident-only routes
Route::middleware(['auth', 'role:' . User::ROLE_RESIDENT])->group(function () {
    Route::get('/resident/dashboard', fn() => view('resident.dashboard'))->name('resident.dashboard');
});

