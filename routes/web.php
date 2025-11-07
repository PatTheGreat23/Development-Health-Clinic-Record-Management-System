<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => redirect('/login'));

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| DASHBOARD ROUTES (Per Role)
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', fn() => view('dashboards.admin_panel'))->name('admin.dashboard');
Route::get('/staff/dashboard', fn() => view('dashboards.staff_panel'))->name('staff.dashboard');
Route::get('/patient/dashboard', fn() => view('dashboards.patient_panel'))->name('patient.dashboard');

Route::get('/patient/appointments', fn() => view('patient.appointments'));
Route::get('/patient/records', fn() => view('patient.records'));
Route::get('/patient/messages', fn() => view('patient.messages'));

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // 🏠 Admin Dashboard
    Route::get('/dashboard', fn() => view('dashboards.admin_panel'))->name('admin.dashboard');

    // 👥 Manage Users (Grouped by Role)
    Route::prefix('manage-users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.manage-users');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::put('/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        // Filtered Views by Role
        Route::get('/patients', [UserController::class, 'patients'])->name('admin.users.patients');
        Route::get('/doctors', [UserController::class, 'doctors'])->name('admin.users.doctors');
        Route::get('/nurses', [UserController::class, 'nurses'])->name('admin.users.nurses');
    });
});
