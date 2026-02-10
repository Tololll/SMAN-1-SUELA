<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AlumniRecordController;
use App\Http\Controllers\GuestSubmissionController;
use Illuminate\Support\Facades\Route;

// Home: show dashboard (if authenticated will see dashboard page)
// Redirect root to dashboard (dashboard route is auth-protected)
Route::redirect('/', '/dashboard');

// Dashboard - use controller to provide stats
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Public: guest submissions from dashboard form
Route::post('/guest/submit', [GuestSubmissionController::class, 'store'])->name('guest.submit');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Student profile (for logged-in student)
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('students.profile');
    Route::post('/student/profile', [StudentController::class, 'storeProfile'])->name('students.profile.store');

    // Add alumni record from student
    Route::post('/student/records', [AlumniRecordController::class, 'store'])->name('student.records.store');

    // Admin routes (simple authorization via Gate)
    Route::get('/admin/students/export', [StudentController::class, 'export'])->name('admin.students.export');
    Route::get('/admin/students', [StudentController::class, 'index'])->name('admin.students.index');
    Route::get('/admin/students/{student}', [StudentController::class, 'show'])->name('admin.students.show');
    Route::get('/admin/students/{student}/edit', [StudentController::class, 'edit'])->name('admin.students.edit');
    Route::put('/admin/students/{student}', [StudentController::class, 'update'])->name('admin.students.update');
    Route::delete('/admin/students/{student}', [StudentController::class, 'destroy'])->name('admin.students.destroy'); // ✅ ROUTE DESTROY DITAMBAHKAN
    Route::delete('/admin/records/{alumniRecord}', [AlumniRecordController::class, 'destroy'])->name('admin.records.destroy');
});

require __DIR__.'/auth.php';