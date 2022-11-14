<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\GlobalData;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [DashboardController::class, 'index'])->name('front');

// Login 
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard 
Route::middleware([GlobalData::class])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth:web');
    
    // Department 
    Route::get('/department', [DashboardController::class, 'department'])->name('root-department')->middleware('auth:web');
    Route::post('/dept-create', [DashboardController::class, 'createDepartment'])->name('dept-create')->middleware('auth:web');
    Route::get('/alldepartment', [DashboardController::class, 'allDepartment'])->name('all-department')->middleware('auth:web');

    // Settings
    Route::get('/settings', [DashboardController::class, 'settings'])->name('root-settings')->middleware('auth:web');
    Route::post('/settings-name', [DashboardController::class, 'settingsName'])->name('settings-name')->middleware('auth:web');
    Route::post('/settings-email', [DashboardController::class, 'settingsEmail'])->name('settings-email')->middleware('auth:web');
    Route::post('/settings-photo', [DashboardController::class, 'settingsPhoto'])->name('settings-photo')->middleware('auth:web');
    Route::post('/settings-password', [DashboardController::class, 'settingsPassword'])->name('settings-password')->middleware('auth:web');

});

