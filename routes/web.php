<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//   return view('employer.dashboard');
// });

// Route::get('/', function () {
//   return view('auth.register');
// });
Route::get('/', function () {
  return view('employer.dashboard');
});

Route::get('employer.job-posts', function () {
  return view('employer.job-posts');
});
Route::get('general.general', function () {
  return view('general.general');
});
Route::get('employer.candidates', function () {
    return view('employer.candidates');
});
Route::get('employer.profile', function () {
    return view('employer.profile');
});
Route::get('employer.manage-jobs', function () {
    return view('employer.manage-jobs');
});
