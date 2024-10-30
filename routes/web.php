<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/auth/register/job-seeker', [AuthController::class, 'showJobSeekerRegistrationForm'])->name('register.job-seeker_form');
Route::post('/register/job-seeker', [AuthController::class, 'registerJobSeeker'])->name('register.job-seeker');

Route::get('/register/recruiter', [AuthController::class, 'showRecruiterRegistrationForm'])->name('register.recruiter_form');
Route::post('/register/recruiter', [AuthController::class, 'registerRecruiter'])->name('register.recruiter');
