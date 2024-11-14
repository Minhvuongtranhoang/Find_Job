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

// Route::get('/job_seeker/home', function () {
//   return view('job_seeker.home');
// })->name('job_seeker.home');
use App\Http\Controllers\JobSeeker\HomeController;

// Route::get('/job_seeker/home', [HomeController::class, 'index'])->name('job_seeker.home');
// Route::get('/job_seeker/home', [HomeController::class, 'index'])->name('job_seeker.job.show');
// Route::get('/job_seeker/home', [HomeController::class, 'index'])->name('job_seeker.job.companies.show');

use App\Http\Controllers\JobSeeker\JobController;

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/jobs/{id}', [JobController::class, 'show'])->name('job.show');
Route::post('/jobs/{id}/apply', [JobController::class, 'apply'])->name('job.apply');
Route::get('jobs/{job}', [JobController::class, 'show'])->name('job.show');


// Các route khác...

Route::get('/search', [JobController::class, 'search'])->name('job.search');
use App\Http\Controllers\JobSeeker\ProfileController;

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    // Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
Route::post('/jobs/{job}/toggle-save', [JobController::class, 'toggleSave'])->name('job.toggleSave');

