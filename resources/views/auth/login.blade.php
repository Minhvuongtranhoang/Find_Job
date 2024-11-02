{{-- @extends('layouts.app') --}}

@section('content')
<div class="container">
    <h2>Đăng Nhập</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
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

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </div>

        <div class="mt-3">
            <p>
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

