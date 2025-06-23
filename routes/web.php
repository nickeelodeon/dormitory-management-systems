<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StaffController;
use App\Http\ControllersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResidentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin-only routes j 
Route::middleware(['auth', 'role:' . User::ROLE_ADMIN])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [ResidentController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/edit_profile', [AdminController::class, 'edit_profile'])->name('admin.edit');
    Route::delete('/admin/dashboard/resident/{resident}/delete', [ResidentController::class, 'destroy'])->name('admin.delresident');
    Route::get('admin/dashboard/resident/{resident}/edit', [ResidentController::class, 'edit'])->name('admin.editresident');
    Route::put('admin/dashboard/resident/{resident/update}', [ResidentController::class, 'update'])->name('admin.updateresident');

    // Room Management
    Route::get('/admin/dashboard/room', [RoomController::class, 'index'])->name('admin.room');
    Route::get('/admin/dashboard/room/add', [RoomController::class, 'create'])->name('admin.addroom');
    Route::post('/admin/dashboard/room/add', [RoomController::class, 'store'])->name('admin.room.store');
    Route::delete('/admin/dashboard/room/{room}/delete', [RoomController::class, 'destroy'])->name('admin.delroom');
    Route::get('admin/dashboard/room/{room}/edit', [RoomController::class, 'edit'])->name('admin.editroom');
    Route::put('admin/dashboard/room/{room}/update', [RoomController::class, 'update'])->name('admin.updateroom');

    // Staff Management
    Route::get('/admin/dashboard/staff', [StaffController::class, 'index'])->name('admin.staff');
    Route::get('/admin/dashboard/staff/add', [StaffController::class, 'create'])->name('admin.addstaff');
    Route::post('/admin/dashboard/staff/add', [StaffController::class, 'store'])->name('admin.staff.store');
    Route::delete('/admin/dashboard/staff/{staff}/delete', [StaffController::class, 'destroy'])->name('admin.delstaff');
    Route::get('admin/dashboard/staff/{staff}/edit', [StaffController::class, 'edit'])->name('admin.editstaff');
    Route::put('admin/dashboard/staff/{staff}/update', [StaffController::class, 'update'])->name('admin.updatestaff');
});

// Staff-only routes
Route::middleware(['auth', 'role:' . User::ROLE_STAFF])->group(function () {
    Route::get('/staff/dashboard', [ResidentController::class, 'index1'])->name('staff.dashboard');
    Route::get('/staff/dashboard/room', [RoomController::class, 'index1'])->name('staff.room');
    Route::delete('/staff/dashboard/room/{room}/delete', [ResidentController::class, 'destroy1'])->name('staff.delroom');
    Route::delete('/staff/dashboard/resident/{resident}/delete', [ResidentController::class, 'destroy1'])->name('staff.delresident');
});

// Resident-only routes
Route::middleware(['auth', 'role:' . User::ROLE_RESIDENT])->group(function () {
    Route::get('/resident/dashboard', [RoomController::class, 'index2'])->name('resident.dashboard');
});

