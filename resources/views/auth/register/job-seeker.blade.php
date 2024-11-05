@extends('job_seeker.layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-5">
        <h2 class="text-center mb-4">Đăng Ký Người Tìm Việc</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.job-seeker') }}" method="POST" class="p-4 border rounded shadow-sm">
            @csrf
            <div class="form-group mb-3">
                <label for="full_name">Họ và tên</label>
                <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="phone">Số điện thoại</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation">Xác nhận mật khẩu</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
        </form>
    </div>
</div>
@endsection
