@extends('job_seeker.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h2 class="h4 mb-0">
                        <i class="bi bi-person-circle me-2"></i>
                        Thông tin cá nhân
                    </h2>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="position-relative d-inline-block">
                            <img 
                                src="{{ $jobSeeker->avatar ? asset('storage/' . $jobSeeker->avatar) : asset('default-avatar.png') }}" 
                                alt="Avatar" 
                                class="rounded-circle border border-3 border-primary shadow"
                                width="150" 
                                height="150"
                                style="object-fit: cover;"
                            >
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center py-3">
                                    <i class="bi bi-person text-primary me-3 fs-5"></i>
                                    <div>
                                        <small class="text-muted d-block">Họ và Tên</small>
                                        <strong>{{ $jobSeeker->full_name }}</strong>
                                    </div>
                                </div>

                                <div class="list-group-item d-flex align-items-center py-3">
                                    <i class="bi bi-envelope text-primary me-3 fs-5"></i>
                                    <div>
                                        <small class="text-muted d-block">Email</small>
                                        <strong>{{ $user->email }}</strong>
                                    </div>
                                </div>

                                <div class="list-group-item d-flex align-items-center py-3">
                                    <i class="bi bi-telephone text-primary me-3 fs-5"></i>
                                    <div>
                                        <small class="text-muted d-block">Số điện thoại</small>
                                        <strong>{{ $user->phone }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary px-4">
                            <i class="bi bi-pencil-square me-2"></i>
                            Chỉnh sửa thông tin
                        </a>
                    </div>
                </div>
            </div>

            <!-- Optional: Additional Information Cards -->
            <div class="row mt-4 g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <i class="bi bi-file-earmark-text text-primary me-2"></i>
                                CV của bạn
                            </h5>
                            <p class="text-muted mb-3">Tải lên CV để nhà tuyển dụng có thể tìm thấy bạn dễ dàng hơn</p>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="bi bi-upload me-2"></i>
                                Tải lên CV
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <i class="bi bi-bell text-primary me-2"></i>
                                Thông báo việc làm
                            </h5>
                            <p class="text-muted mb-3">Cài đặt thông báo để không bỏ lỡ cơ hội việc làm phù hợp</p>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="bi bi-gear me-2"></i>
                                Cài đặt thông báo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection