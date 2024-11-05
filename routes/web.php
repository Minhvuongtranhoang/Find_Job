<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Recruiter\JobController;
use App\Http\Controllers\Recruiter\CompanyController;
use App\Http\Controllers\Recruiter\ApplicationController;
use App\Http\Controllers\Recruiter\DashboardController;


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

// Recruiter company routes
Route::middleware('auth')->group(function () {

  Route::get('/recruiter/dashboard', [DashboardController::class, 'index'])->name('recruiter.dashboard');

  Route::get('/recruiter/company/edit', [CompanyController::class, 'edit'])->name('recruiter.company.edit');
  Route::put('/recruiter/company/update', [CompanyController::class, 'update'])->name('recruiter.company.update');

  // Job routes
  Route::get('/recruiter/jobs', [JobController::class, 'index'])->name('recruiter.jobs.index');
  Route::get('/recruiter/jobs/create', [JobController::class, 'create'])->name('recruiter.jobs.create');
  Route::post('/recruiter/jobs', [JobController::class, 'store'])->name('recruiter.jobs.store');
  Route::get('/recruiter/jobs/{job}/edit', [JobController::class, 'edit'])->name('recruiter.jobs.edit');
  Route::put('/recruiter/jobs/{job}', [JobController::class, 'update'])->name('recruiter.jobs.update');
  Route::delete('/recruiter/jobs/{job}', [JobController::class, 'destroy'])->name('recruiter.jobs.destroy');

  // Application routes
  Route::get('/recruiter/applications', [ApplicationController::class, 'index'])->name('recruiter.applications.index');
  Route::get('/recruiter/applications/{application}', [ApplicationController::class, 'show'])->name('recruiter.applications.show');
  Route::put('/recruiter/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('recruiter.applications.update-status');
  Route::get('/recruiter/applications/{application}/download-cv', [ApplicationController::class, 'downloadCV'])->name('recruiter.applications.download-cv');
});
