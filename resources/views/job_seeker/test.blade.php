@extends('job_seeker.layouts.app')

@section('title', 'Trang chủ')

@section('content')
    {{-- Phần thanh tìm kiếm --}}
    <section class="search-bar">
        <form action="{{ route('job.search') }}" method="GET">
            <input type="text" name="keyword" placeholder="Tìm kiếm công việc...">
            <select name="category_id">
                <option value="">Chọn ngành nghề</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <select name="location_id">
                <option value="">Chọn địa điểm</option>
                <!-- Add location options here -->
            </select>
            <button type="submit">Tìm kiếm</button>
        </form>
    </section>

    {{-- Phần Slide Show hiển thị công việc nổi bật --}}
    <section class="featured-jobs-slider">
        <div id="jobCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($featuredJobs as $key => $job)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <div class="job-slide">
                            <h3>{{ $job->title }}</h3>
                            <p>{{ $job->company->name }}</p>
                            <p>{{ $job->location->address }}</p>
                            <a href="{{ route('job.show', $job->id) }}">Xem chi tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev"  href="#jobCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#jobCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    

    {{-- Phần hiển thị các danh mục nổi bật --}}
    <section class="featured-categories">
        <h2>Danh mục nổi bật</h2>
        <div class="categories-list">
            @foreach($highlightedCategories as $category)
                <div class="category-card">
                    <h3>{{ $category->name }}</h3>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Phần hiển thị các công ty nổi bật --}}
    <section class="featured-companies">
        <h2>Công ty nổi bật</h2>
        <div class="companies-list">
            @foreach($featuredCompanies as $company)
                <div class="company-card">
                    <a href="{{ $company->website }}" class="company-link">
                        <div class="company-logo">
                            <img src="{{ $company->logo }}" alt="Logo của {{ $company->name }}">
                        </div>
                        <h3>{{ $company->name }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    

    {{-- Phần hiển thị danh sách công việc --}}
    <section class="job-list">
        <h2>Công việc mới nhất</h2>
        <div class="job-cards">
            @foreach($jobs as $job)
                <div class="job-card">
                    <div class="job-card-logo">
                        <img src="{{ $job->company->logo }}" alt="Logo công ty">
                    </div>
                    
                    <!-- Heart Icon for Favoriting -->
                    <div class="favorite-icon" data-id="{{ $job->id }}">
                        <i class="fa {{ $job->isFavoritedByUser ? '
fas fa-briefcase' : '
fas fa-briefcase-o' }}">iii</i> 
                    </div>
    
                    <h3>{{ $job->title }}</h3>
                    <p>{{ $job->company->name }}</p>
                    <p>{{ $job->salary }}</p>
                    <p>{{ $job->location->address }}</p>
                    <a href="{{ route('job.show', $job->id) }}">Xem chi tiết</a>
                    <button>Ứng tuyển</button>
                </div>
            @endforeach
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
