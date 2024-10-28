<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <!-- Custom CSS -->
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #343a40;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
@extends('layouts.employer')
  @section('content')
    <div class="col-lg-10 content">
      <div class="container my-5">
        <div class="form-container">
          <h1>Post a Job</h1>
          <form action="/post-job" method="POST">
            @csrf
            <div class="mb-3">
              <label for="job_title" class="form-label">Job Title</label>
              <input type="text" class="form-control" id="job_title" name="job_title" required>
            </div>

            <div class="mb-3">
              <label for="work_location" class="form-label">Work Location</label>
              <input type="text" class="form-control" id="work_location" name="work_location" required>
            </div>

            <div class="mb-3">
              <label for="job_description" class="form-label">Job Description</label>
              <textarea class="form-control" id="job_description" name="job_description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
              <label for="job_requirements" class="form-label">Job Requirements</label>
              <textarea class="form-control" id="job_requirements" name="job_requirements" rows="4" required></textarea>
            </div>

            <div class="mb-3">
              <label for="employee_benefits" class="form-label">Employee Benefits</label>
              <textarea class="form-control" id="employee_benefits" name="employee_benefits" rows="4" required></textarea>
            </div>

            <div class="mb-3">
              <label for="working_hours" class="form-label">Working Hours</label>
              <input type="text" class="form-control" id="working_hours" name="working_hours" required>
            </div>

            <div class="mb-3">
              <label for="basic_salary" class="form-label">Basic Salary</label>
              <input type="text" class="form-control" id="basic_salary" name="basic_salary" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Post Job</button>
          </form>
        </div>
      </div>
    </div>


      <!-- Bootstrap 5 JS and Popper.js -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

      <!-- Initialize CKEditor 5 -->
      <script>
        ClassicEditor
          .create(document.querySelector('#job_description'))
          .catch(error => { console.error(error); });

        ClassicEditor
          .create(document.querySelector('#job_requirements'))
          .catch(error => { console.error(error); });

        ClassicEditor
          .create(document.querySelector('#employee_benefits'))
          .catch(error => { console.error(error); });
      </script>
@endSection
</body>
</html>
