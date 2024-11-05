@extends('job_seeker.layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-5">
        <h2 class="text-center mb-4">Đăng Nhập</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="p-4 border rounded shadow-sm">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group mb-3">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group form-check mb-3">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            </div>

            <div class="mt-3 text-center">
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                </p>
                <p>
                    Chưa có tài khoản?
                    <a href="{{ route('register.job-seeker') }}">Đăng ký Người tìm việc</a> |
                    <a href="{{ route('register.recruiter') }}">Đăng ký Nhà tuyển dụng</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
