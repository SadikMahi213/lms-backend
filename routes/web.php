<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\CourseController;

// Public Routes
Route::get('/', function () {
    return view('index');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/notice-board', [AdminController::class, 'noticeBoard'])->name('notice-board');
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
    Route::get('/portfolio', [AdminController::class, 'portfolio'])->name('portfolio');
    Route::get('/courses', [CourseController::class, 'courses'])->name('courses');
    Route::get('/teachers', [CourseController::class, 'teachers'])->name('teachers');
     Route::get('/students', [CourseController::class, 'students'])->name('students');

});

// Teacher Routes
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');
    Route::get('/upload-course', [TeacherController::class, 'uploadCourse'])->name('upload-course');
    Route::get('/exam-creation', [TeacherController::class, 'examCreation'])->name('exam-creation');
    Route::get('/annotation', [TeacherController::class, 'annotation'])->name('annotation');
    Route::get('/message-inbox', [TeacherController::class, 'messageInbox'])->name('message-inbox');
});

// Student Routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/my-courses', [StudentController::class, 'myCourses'])->name('my-courses');
    Route::get('/library', [StudentController::class, 'library'])->name('library');
    Route::get('/exam-portal-general', [StudentController::class, 'examPortalGeneral'])->name('exam-portal-general');
    Route::get('/exam-portal-batch', [StudentController::class, 'examPortalBatch'])->name('exam-portal-batch');
    Route::get('/exam-status', [StudentController::class, 'examStatus'])->name('exam-status');
    Route::get('/message-inbox', [StudentController::class, 'messageInbox'])->name('message-inbox');
    Route::get('/cart', [StudentController::class, 'cart'])->name('cart');
});
