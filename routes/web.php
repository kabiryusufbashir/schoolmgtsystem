<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\GlobalData;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;

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
Route::post('/student/login', [LoginController::class, 'studentLogin'])->name('login-student');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// DASHBOARD 
Route::group(['prefix' => 'admin'], function (){
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
    
    // Student
    Route::get('/student', [DashboardController::class, 'student'])->name('root-student')->middleware('auth:web');
    Route::get('/allstudent', [DashboardController::class, 'allStudent'])->name('all-student')->middleware('auth:web');
    Route::get('/student-create', [DashboardController::class, 'createStudent'])->name('create-student')->middleware('auth:web');
    Route::get('/student-bulk-upload', [DashboardController::class, 'studentBulkUpload'])->name('student-bulk-upload')->middleware('auth:web');
    Route::post('/upload-student-bulk', [DashboardController::class, 'studentBulkUploadStore'])->name('student-bulk-upload-store')->middleware('auth:web');
    Route::post('/add-create', [DashboardController::class, 'addStudent'])->name('add-student')->middleware('auth:web');
    Route::get('/student/{student}/edit/step_1', [DashboardController::class, 'editStudentStep1'])->name('student-edit-step-1')->middleware('auth:web');
    Route::patch('/student/{student}/update/step_1', [DashboardController::class, 'updateStudentStep1'])->name('student-update-step-1')->middleware('auth:web');
    Route::get('/student/{student}/edit/step_2', [DashboardController::class, 'editStudentStep2'])->name('student-edit-step-2')->middleware('auth:web');
    Route::patch('/student/{student}/update/step_2', [DashboardController::class, 'updateStudentStep2'])->name('student-update-step-2')->middleware('auth:web');
    Route::get('/student/{student}/edit/step_3', [DashboardController::class, 'editStudentStep3'])->name('student-edit-step-3')->middleware('auth:web');
    Route::patch('/student/{student}/update/step_3', [DashboardController::class, 'updateStudentStep3'])->name('student-update-step-3')->middleware('auth:web');
    Route::get('/student/{student}/edit/step_4', [DashboardController::class, 'editStudentStep4'])->name('student-edit-step-4')->middleware('auth:web');
    Route::patch('/student/{student}/update/step_4', [DashboardController::class, 'updateStudentStep4'])->name('student-update-step-4')->middleware('auth:web');
    Route::delete('/student/{student}', [DashboardController::class, 'deleteStudent'])->name('student-delete')->middleware('auth:web');

    // Registration
    Route::get('/registration', [DashboardController::class, 'registration'])->name('root-registration')->middleware('auth:web');
    Route::post('/registration-create', [DashboardController::class, 'createRegistration'])->name('registration-create')->middleware('auth:web');
    Route::post('/student-registration-create', [DashboardController::class, 'createRegistrationStudent'])->name('student-registration-create')->middleware('auth:web');
    Route::get('/allregistration', [DashboardController::class, 'allRegistration'])->name('all-registration')->middleware('auth:web');
    Route::get('/registration/{registration}/edit', [DashboardController::class, 'editRegistration'])->name('registration-edit')->middleware('auth:web');
    Route::patch('/registration/{registration}/update', [DashboardController::class, 'updateRegistration'])->name('registration-update')->middleware('auth:web');
    Route::delete('/registration/{registration}', [DashboardController::class, 'deleteRegistration'])->name('registration-delete')->middleware('auth:web');

    // Calendar
    Route::get('/calendar', [DashboardController::class, 'calendar'])->name('root-calendar')->middleware('auth:web');
    Route::post('/calendar-create', [DashboardController::class, 'createCalendar'])->name('calendar-create')->middleware('auth:web');
    Route::get('/allcalendar', [DashboardController::class, 'allCalendar'])->name('all-calendar')->middleware('auth:web');
    Route::get('/calendar/{calendar}/edit', [DashboardController::class, 'editCalendar'])->name('calendar-edit')->middleware('auth:web');
    Route::patch('/calendar/{calendar}/update', [DashboardController::class, 'updateCalendar'])->name('calendar-update')->middleware('auth:web');
    Route::delete('/calendar/{calendar}', [DashboardController::class, 'deleteCalendar'])->name('calendar-delete')->middleware('auth:web');
    
    // Timetable
    Route::get('/timetable', [DashboardController::class, 'timetable'])->name('root-timetable')->middleware('auth:web');
    Route::post('/timetable-create', [DashboardController::class, 'createTimetable'])->name('timetable-create')->middleware('auth:web');
    Route::get('/alltimetable', [DashboardController::class, 'allTimetable'])->name('all-timetable')->middleware('auth:web');
    Route::get('/timetable/{timetable}/show', [DashboardController::class, 'showTimetable'])->name('timetable-show')->middleware('auth:web');
    Route::get('/timetable/{timetable}/edit', [DashboardController::class, 'editTimetable'])->name('timetable-edit')->middleware('auth:web');
    Route::patch('/timetable/{timetable}/update', [DashboardController::class, 'updateTimetable'])->name('timetable-update')->middleware('auth:web');
    Route::delete('/timetable/{timetable}', [DashboardController::class, 'deleteTimetable'])->name('timetable-delete')->middleware('auth:web');

    // EXAM
    Route::get('/exam', [DashboardController::class, 'exam'])->name('root-exam')->middleware('auth:web');
    Route::post('/exam-create', [DashboardController::class, 'createExam'])->name('exam-create')->middleware('auth:web');
    Route::get('/allexam', [DashboardController::class, 'allExam'])->name('all-exam')->middleware('auth:web');
    Route::get('/exam/{exam}/edit', [DashboardController::class, 'editExam'])->name('exam-edit')->middleware('auth:web');
    Route::patch('/exam/{exam}/update', [DashboardController::class, 'updateExam'])->name('exam-update')->middleware('auth:web');
    Route::delete('/exam/{exam}', [DashboardController::class, 'deleteExam'])->name('exam-delete')->middleware('auth:web');
    
    // RESULT
    Route::get('/result', [DashboardController::class, 'result'])->name('root-result')->middleware('auth:web');
    Route::post('/result-create', [DashboardController::class, 'createResult'])->name('result-create')->middleware('auth:web');
    Route::get('/insert-result', [DashboardController::class, 'insertResult'])->name('insert-result')->middleware('auth:web');
    Route::post('/submit-result', [DashboardController::class, 'submitResult'])->name('submit-result')->middleware('auth:web');
    Route::get('/allresult', [DashboardController::class, 'allResult'])->name('all-result')->middleware('auth:web');
    Route::get('/result/{semester}/show', [DashboardController::class, 'showResult'])->name('result-show')->middleware('auth:web');
    Route::get('/result/{result}/edit', [DashboardController::class, 'editResult'])->name('result-edit')->middleware('auth:web');
    Route::patch('/result/{result}/update', [DashboardController::class, 'updateResult'])->name('result-update')->middleware('auth:web');
    Route::delete('/result/{result}', [DashboardController::class, 'deleteResult'])->name('result-delete')->middleware('auth:web');

    // Settings
    Route::get('/settings', [DashboardController::class, 'settings'])->name('root-settings')->middleware('auth:web');
    Route::post('/settings-name', [DashboardController::class, 'settingsName'])->name('settings-name')->middleware('auth:web');
    Route::post('/settings-email', [DashboardController::class, 'settingsEmail'])->name('settings-email')->middleware('auth:web');
    Route::post('/settings-photo', [DashboardController::class, 'settingsPhoto'])->name('settings-photo')->middleware('auth:web');
    Route::post('/settings-password', [DashboardController::class, 'settingsPassword'])->name('settings-password')->middleware('auth:web');

});

// STUDENTS 
Route::group(['prefix' => 'student'], function () {
    Route::middleware([GlobalData::class])->group(function(){
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student-dashboard')->middleware('auth:students');
    
        // Settings
        Route::get('/settings', [StudentController::class, 'settings'])->name('student-settings')->middleware('auth:students');
        Route::post('/settings-photo', [StudentController::class, 'settingsPhoto'])->name('student-settings-photo')->middleware('auth:students');
        Route::post('/settings-password', [StudentController::class, 'settingsPassword'])->name('student-settings-password')->middleware('auth:students');
    });
});


