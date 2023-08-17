<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;


date_default_timezone_set('Asia/Kolkata');
    Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!!!!";
 });

 Route::get('/', function () {
    return view('admin.pages.authentication.login');
});

 Route::get('/admin', function () {
    return view('admin.pages.authentication.login');
});

Route::post('/adminLogin', [AdminController::class,'adminLogin']);

Route::prefix('admin')->middleware(['chkAdminLogin'])->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', function (Request $request) {
    return view('admin.pages.dashboard', compact('request'));
    });

    Route::get('/log-out','logout');

    //change password
    Route::get('/change-password','change_password');
    Route::post('/change-adminLogin','changePassword');

    // course
    Route::get('/list-course', [CourseController::class, 'list_course']);
    Route::get('/add-course', [CourseController::class, 'add_course']);
    Route::post('/addCourse', [CourseController::class, 'addCourse']);
    Route::get('/edit-course/{id}', [CourseController::class, 'edit_course']);
    Route::post('/editCourse/{id}', [CourseController::class, 'editCourse']);
    Route::get('/deleteCourse/{id}', [CourseController::class, 'deleteCourse']);

    // Student
    Route::get('/list-student', [StudentController::class, 'list_student']);
    Route::get('/add-student', [StudentController::class, 'add_student']);
    Route::post('/addStudent', [StudentController::class, 'addStudent']);
    Route::get('/edit-student/{id}', [StudentController::class, 'edit_student']);
    Route::post('/editStudent/{id}', [StudentController::class, 'editStudent']);
    Route::get('/deleteStudent/{id}', [StudentController::class, 'deleteStudent']);
    Route::post('/studentstatuschanger/{id}', [StudentController::class, 'studentstatuschanger']);

    // Faculty
    Route::get('/list-faculty', [FacultyController::class, 'list_faculty']);
    Route::get('/add-faculty', [FacultyController::class, 'add_faculty']);
    Route::post('/addFaculty', [FacultyController::class, 'addFaculty']);
    Route::get('/edit-faculty/{id}', [FacultyController::class, 'edit_faculty']);
    Route::post('/editFaculty/{id}', [FacultyController::class, 'editFaculty']);
    Route::get('/deleteFaculty/{id}', [FacultyController::class, 'deleteFaculty']);
    Route::post('/facultystatuschanger/{id}', [FacultyController::class, 'facultystatuschanger']);

    //Profile
    Route::get("/profile",[ProfileController::class,"profile"]);
    Route::post("/addProfile/{id}",[ProfileController::class,"addProfile"]);



});
// dependend dropdown
// Route::post('/getState', [FacultyController::class, 'getState']);
Route::post('/getDuration', [StudentController::class, 'getduration']);
Route::post('/getDetails', [StudentController::class, 'getdetails']);
