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
    Route::get('/department/{dept}/edit', [DashboardController::class, 'editDepartment'])->name('dept-edit')->middleware('auth:web');
    Route::patch('/department/{department}/update', [DashboardController::class, 'updateDepartment'])->name('dept-update')->middleware('auth:web');
    Route::delete('/department/{department}', [DashboardController::class, 'deleteDepartment'])->name('dept-delete')->middleware('auth:web');

    // Course
    Route::get('/course', [DashboardController::class, 'course'])->name('root-course')->middleware('auth:web');
    Route::post('/course-create', [DashboardController::class, 'createCourse'])->name('course-create')->middleware('auth:web');
    Route::get('/allcourse', [DashboardController::class, 'allCourse'])->name('all-course')->middleware('auth:web');
    Route::get('/course/{course}/edit', [DashboardController::class, 'editCourse'])->name('course-edit')->middleware('auth:web');
    Route::patch('/course/{course}/update', [DashboardController::class, 'updateCourse'])->name('course-update')->middleware('auth:web');
    Route::delete('/course/{course}', [DashboardController::class, 'deleteCourse'])->name('course-delete')->middleware('auth:web');
    
    // Staff
    Route::get('/staff', [DashboardController::class, 'staff'])->name('root-staff')->middleware('auth:web');
    Route::get('/allstaff', [DashboardController::class, 'allStaff'])->name('all-staff')->middleware('auth:web');
    Route::get('/staff-create', [DashboardController::class, 'createStaff'])->name('create-staff')->middleware('auth:web');
    Route::get('/staff-bulk-upload', [DashboardController::class, 'staffBulkUpload'])->name('staff-bulk-upload')->middleware('auth:web');
    Route::post('/upload-staff-bulk', [DashboardController::class, 'staffBulkUploadStore'])->name('staff-bulk-upload-store')->middleware('auth:web');
    Route::post('/add-create', [DashboardController::class, 'addStaff'])->name('add-staff')->middleware('auth:web');
    Route::get('/staff/{staff}/edit/step_1', [DashboardController::class, 'editStaffStep1'])->name('staff-edit-step-1')->middleware('auth:web');
    Route::patch('/staff/{staff}/update/step_1', [DashboardController::class, 'updateStaffStep1'])->name('staff-update-step-1')->middleware('auth:web');
    Route::get('/staff/{staff}/edit/step_2', [DashboardController::class, 'editStaffStep2'])->name('staff-edit-step-2')->middleware('auth:web');
    Route::patch('/staff/{staff}/update/step_2', [DashboardController::class, 'updateStaffStep2'])->name('staff-update-step-2')->middleware('auth:web');
    Route::get('/staff/{staff}/edit/step_3', [DashboardController::class, 'editStaffStep3'])->name('staff-edit-step-3')->middleware('auth:web');
    Route::patch('/staff/{staff}/update/step_3', [DashboardController::class, 'updateStaffStep3'])->name('staff-update-step-3')->middleware('auth:web');
    Route::get('/staff/{staff}/edit/step_4', [DashboardController::class, 'editStaffStep4'])->name('staff-edit-step-4')->middleware('auth:web');
    Route::patch('/staff/{staff}/update/step_4', [DashboardController::class, 'updateStaffStep4'])->name('staff-update-step-4')->middleware('auth:web');
    Route::delete('/staff/{staff}', [DashboardController::class, 'deleteStaff'])->name('staff-delete')->middleware('auth:web');

    // Settings
    Route::get('/settings', [DashboardController::class, 'settings'])->name('root-settings')->middleware('auth:web');
    Route::post('/settings-name', [DashboardController::class, 'settingsName'])->name('settings-name')->middleware('auth:web');
    Route::post('/settings-email', [DashboardController::class, 'settingsEmail'])->name('settings-email')->middleware('auth:web');
    Route::post('/settings-photo', [DashboardController::class, 'settingsPhoto'])->name('settings-photo')->middleware('auth:web');
    Route::post('/settings-password', [DashboardController::class, 'settingsPassword'])->name('settings-password')->middleware('auth:web');

});

