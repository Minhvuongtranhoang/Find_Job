@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Đăng Ký Nhà Tuyển Dụng</h2>
    <form action="{{ route('register.recruiter') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="company_name">Tên công ty</label>
            <input type="text" id="company_name" name="company_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="location">Địa chỉ</label>
            <input type="text" id="location" name="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>
@endsection
