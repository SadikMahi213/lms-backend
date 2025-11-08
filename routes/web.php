<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\StudentController as UserStudentController;
use App\Http\Controllers\Admin\ExamPortalController;

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
     Route::get('/library', [LibraryController::class, 'index'])->name('library');
    Route::get('library/create', [LibraryController::class, 'create'])->name('library.create');
    Route::post('library', [LibraryController::class, 'store'])->name('library.store');
    Route::get('library/{id}/edit', [LibraryController::class, 'edit'])->name('library.edit');
    Route::put('library/{id}', [LibraryController::class, 'update'])->name('library.update');
    Route::get('/students', [UserStudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [UserStudentController::class, 'create'])->name('students.create');
    Route::post('/students', [UserStudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}/edit', [UserStudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [UserStudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [UserStudentController::class, 'destroy'])->name('students.destroy');
     Route::get('exam-portal', [ExamPortalController::class, 'index'])->name('exam-portal');
     Route::post('/students/import', [UserStudentController::class, 'import'])->name('students.import');

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
