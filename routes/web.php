<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Login routes
Route::get('/auth/login', function () {return view('auth.login');})->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Job Seeker registration routes
Route::get('/register/job-seeker', [AuthController::class, 'showJobSeekerRegistrationForm'])->name('register.job-seeker');
Route::post('/register/job-seeker', [AuthController::class, 'registerJobSeeker']);

// Recruiter registration routes
Route::get('/register/recruiter', [AuthController::class, 'showRecruiterRegistrationForm'])->name('register.recruiter');
Route::post('/register/recruiter', [AuthController::class, 'registerRecruiter']);

// Password reset routes
Route::get('/forgot-password', function () {
  return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])
  ->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
  return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])
  ->name('password.update');



// Dashboard routes
Route::get('/general', function () {
    return view('general.general');
})->name('general.view');

Route::get('/job-seeker/dashboard', function () {
    return view('job-seeker.dashboard');
})->name('job-seeker.dashboard');

Route::get('/recruiter/dashboard', function () {
    return view('recruiter.dashboard');
})->name('recruiter.dashboard');

Route::get('/', function () {
  return view('job_seeker.home');
})->name('home');