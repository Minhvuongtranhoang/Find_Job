<!-- Header -->
<header class="header bg-primary text-white">
    <div class="container d-flex justify-content-between align-items-center py-3">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="d-flex align-items-center text-white text-decoration-none">
            <img src="{{ asset('/storage/logo.svg') }}" alt="Logo" class="logo mr-2" style="width: 40px; height: 40px;" />
            <h1 class="h4 mb-0 ml-2">Seek a JOB</h1>
        </a>

        <!-- Navigation Links -->
        <div class="navigation d-flex align-items-center">
            <a href="#" class="text-white mx-3">Hồ sơ/CV</a>
            <a href="#" class="text-white mx-3">Việc làm</a>
            <a href="#" class="text-white mx-3">Công ty</a>
            <a href="#" class="text-white mx-3">Thêm+</a>
        </div>

        <!-- Auth Buttons -->
        <div class="auth-buttons d-flex align-items-center">
                @if(auth()->check())
                    <a href="{{ route('profile') }}">{{ auth()->user()->name ?? 'Tài khoản' }}</a>
                @else
                    <a href="#" class="btn">Nhà tuyển dụng</a>
                    <a href="{{ route('login') }}" class="btn">Đăng Nhập</a>
                @endif
            </div>
            
        </div>
    </div>
</header>
