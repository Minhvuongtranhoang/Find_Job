@extends('job_seeker.layouts.app')

@section('title', 'Trang chủ')

@section('content')
    {{-- Phần thanh tìm kiếm --}}
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-4">Khám phá cơ hội nghề nghiệp</h1>
                    <p class="lead mb-5">Tìm việc làm IT phù hợp với bạn</p>
                    <!-- Search Form with Backend Integration -->
                    <div class="search-form">
                        <form action="{{ route('job.search') }}" method="GET">
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="text" 
                                           name="keyword" 
                                           class="form-control form-control-lg" 
                                           placeholder="Tìm kiếm công việc...">
                                </div>
                                <div class="col-md-6">
                                    <select name="category_id" class="form-select form-select-lg">
                                        <option value="">Chọn ngành nghề</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="location_id" class="form-select form-select-lg">
                                        <option value="">Chọn địa điểm</option>
                                        
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://www.ryrob.com/wp-content/uploads/2022/04/How-to-Name-a-Blog-45-Blog-Name-Ideas-and-Examples-to-Learn-From.jpg" alt="Hero Image" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    {{-- Phần Slide Show hiển thị công việc nổi bật --}}
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Việc làm nổi bật</h2>
            <div class="job-carousel">
                <div id="jobCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($featuredJobs->chunk(3) as $key => $jobChunk)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <div class="job-slide-wrapper">
                                    @foreach($jobChunk as $job)
                                        <div class="job-card-carousel">
                                            <div class="d-flex align-items-center mb-3">
                                                <img src="{{ $job->company->logo_url ?? 'path/to/default/logo.png' }}" alt="{{ $job->company->name }} Logo" class="job-logo">
                                                <div>
                                                    <h5 class="h5">{{ $job->title }}</h5>
                                                    <p class="text-muted mb-2">{{ $job->company->name }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                                <span>{{ $job->location->address }}</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="fas fa-dollar-sign text-primary me-2"></i>
                                                <span>{{ $job->salary_range }}</span>
                                            </div>
                                            <a href="{{ route('job.show', $job->id) }}" class="btn btn-primary w-100">Ứng tuyển ngay</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#jobCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#jobCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    

    {{-- Phần hiển thị các danh mục nổi bật --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-6">
                    <h2 class="mb-0">Danh mục phổ biến</h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <a href="#" class="btn btn-outline-primary">Xem tất cả danh mục</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card text-center">
                        <div class="category-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3 class="h5">Frontend Development</h3>
                        <p class="text-muted">125 việc làm</p>
                        <div class="mt-3">
                            <a href="#" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card text-center">
                        <div class="category-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <h3 class="h5">Backend Development</h3>
                        <p class="text-muted">98 việc làm</p>
                        <div class="mt-3">
                            <a href="#" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card text-center">
                        <div class="category-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="h5">Mobile Development</h3>
                        <p class="text-muted">87 việc làm</p>
                        <div class="mt-3">
                            <a href="#" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card text-center">
                        <div class="category-icon">
                            <i class="fas fa-cloud"></i>
                        </div>
                        <h3 class="h5">Cloud Computing</h3>
                        <p class="text-muted">76 việc làm</p>
                        <div class="mt-3">
                            <a href="#" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

    {{-- Phần hiển thị các công ty nổi bật --}}
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Nhà tuyển dụng nổi bật</h2>
            <div class="row">
                @foreach($featuredCompanies as $company)
                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="company-card text-center">
                            <a href="{{ $company->website }}" class="company-link">
                                <div class="company-logo">
                                    <img src="{{ $company->logo }}" 
                                         alt="Logo của {{ $company->name }}" 
                                         class="img-fluid">
                                </div>
                                <h3 class="company-name mt-2">{{ $company->name }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    

    {{-- Phần hiển thị danh sách công việc --}}
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4">Việc làm mới nhất</h2>
            <div class="row">
                @foreach($jobs as $job)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="job-card">
                        <div class="favorite-icon" data-id="{{ $job->id }}">
                            <i class="fa {{ $job->isFavoritedByUser ? 'fas' : 'far' }} fa-heart"></i>
                        </div>
                        <div class="d-flex align-items">
                            <div class="square-company-logo">
                                <img src="{{ $job->company->logo }}" alt="Company Logo" class="job-logo">
                            </div>
                            <div>
                                <a class="nav-link" href="{{ route('job.show', $job->id) }}">
                                    <h5>{{ $job->title }}</h5>
                                </a>
                                <p class="nav-link text-muted mb-2">{{ $job->company->name }}</p>
                                <div class="nav-link text-muted mb-3">
                                    <i class="fas fa-map-marker-alt me-2"></i>{{ $job->location->address }}
                                    <i class="fas fa-dollar-sign ms-3 me-2"></i>{{ $job->salary }}
                                </div>
                                <button class="btn btn-primary">Ứng tuyển</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    
    
    
    
    

    {{-- Phần blog --}}
    {{-- <section class="blog-section">
        <h2>Blog</h2>
        <div class="blog-list">
            @foreach($blogs as $blog)
                <div class="blog-card">
                    <h3>{{ $blog->title }}</h3>
                    <p>{{ Str::limit($blog->content, 100) }}</p>
                    <a href="{{ route('blog.show', $blog->id) }}">Đọc thêm</a>
                </div>
            @endforeach
        </div>
    </section> --}}
@endsection
