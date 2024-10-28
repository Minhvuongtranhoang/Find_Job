@extends('layouts.employer')
@section('content')
  <div class="col-lg-10 content">
    <div class="min-vh-100 bg-light">
      <!-- Profile Header -->
      <div class="profile-header d-flex align-items-center">
        <div class="profile-img">
          <img src="path/to/company-logo.jpg" alt="Company logo">
        </div>
        <div class="profile-info">
          <h3>Company Name</h3>
          <p>Slogan</p>
        </div>
      </div>

      <!-- Profile Content -->
      <div class="profile-content container">
        <div class="row">
          <!-- Left Sidebar -->
          <div class="col-lg-4">
            <!-- Personal Information Card -->
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">Thông tin Liên hệ</h5>
                {{-- <form action="{{ route('employer.profile.update') }}" method="POST">
                  @csrf --}}
                  <ul class="list-unstyled">
                    <li><strong>Email:</strong> <input type="email" name="email" value="" class="form-control"></li>
                    <li><strong>Hotline:</strong> <input type="text" name="hotline" value="" class="form-control"></li>
                    <li><strong>Website:</strong> <input type="text" name="website" value="" class="form-control"></li>
                    <li><strong>Địa chỉ:</strong> <input type="text" name="address" value="" class="form-control"></li>
                    <li><strong>Link google Map:</strong> <input type="text" name="link" value="" class="form-control"></li>
                  </ul>
                  <button type="submit" class="btn btn-primary mt-3">Save</button>
                {{-- </form> --}}
              </div>
            </div>

            <!-- Statistics Card -->
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">Thống kê</h5>
                <div class="row text-center">
                  <div class="col-6">
                    <div class="p-3 bg-light rounded">
                      <h6 class="text-muted">Số lượng nhân viên</h6>
                      <h2 class="mb-0">0</h2>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="p-3 bg-light rounded">
                      <h6 class="text-muted">Số lượng công việc</h6>
                      <h2 class="mb-0">0</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Main Content -->
          <div class="col-lg-8">
            <!-- Company Information -->
            <div class="card mb-4">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h5 class="card-title mb-0">Thông tin Công ty</h5>
                  <button type="button" class="btn btn-link">Edit</button>
                </div>
                {{-- <form action="{{ route('employer.company.update') }}" method="POST">
                  @csrf --}}
                  <ul class="list-unstyled">
                    <li><strong>Tên Công ty:</strong> <input type="text" name="company_name" value="" class="form-control"></li>
                    <li><strong>Logo:</strong> <input type="text" name="company_logo" value="" class="form-control"></li>
                    <li><strong>Khẩu hiệu:</strong> <input type="url" name="slogan" value="" class="form-control"></li>
                    <li><strong>Số lượng nhân viên:</strong> <input type="url" name="num_employee" value="" class="form-control"></li>
                    <li><strong>Số lượng công việc:</strong> <input type="text" name="num_job" value="" class="form-control"></li>
                    <li><strong>Giới thiệu:</strong> <textarea name="description" class="form-control"></textarea></li>
                  </ul>
                  <button type="submit" class="btn btn-primary mt-3">Save</button>
                {{-- </form> --}}
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endSection
