<!-- resources/views/home.blade.php -->
@extends('job_seeker.layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Banner -->
    <div class="text-center">
        <h1>Khám phá cơ hội nghề nghiệp</h1>
        <p>Tìm việc làm phù hợp với bạn</p>
    </div>

    <!-- Search Section -->
    <div class="d-flex justify-content-center my-4">
        <input type="text" class="form-control" placeholder="Tên công việc, công ty, ngành nghề...">
        <button class="btn btn-primary ml-2">Tìm kiếm</button>
    </div>

    <!-- Featured Jobs Slide Show -->
    <div class="mb-4">
        <h2>Việc làm nổi bật</h2>
        <div id="featuredJobsCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($featuredJobs as $key => $job)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->title }}</h5>
                                <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                                <a href="#" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#featuredJobsCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#featuredJobsCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- Popular Categories -->
    <div class="mb-4">
        <h2>Danh mục phổ biến</h2>
        <div class="d-flex">
            @foreach ($popularCategories as $category)
                <div class="p-2">
                    <button class="btn btn-outline-primary">{{ $category->name }}</button>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Featured Companies -->
    <div class="mb-4">
        <h2>Nhà tuyển dụng nổi bật</h2>
        <div class="d-flex">
            @foreach ($featuredCompanies as $company)
                <div class="p-2">
                    <div class="card" style="width: 100px;">
                        <img src="{{ $company->logo }}" class="card-img-top" alt="{{ $company->company_name }}">
                        {{-- <div class="card-body">
                            <h5 class="card-title">{{ $company->company_name }}</h5>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Blog Section -->
    <div class="mb-4">
        <h2>Blog IT mới nhất</h2>
        <div class="d-flex">
            <div class="p-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Xu hướng công nghệ 2024</h5>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kĩ năng IT cần có</h5>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thị trường việc làm 2024</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center"><a href="#"><< Xem thêm >></a></div>
    </div>
    <div class="mb-4">
        <div class="job-list">
            <h3>Tất cả công việc</h3>
            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col job-item">
                        <h4>{{ $job->title }}</h4>
                        <p>{{ $job->company ? $job->company->company_name : 'Chưa có công ty' }}</p>
                        {{-- <p>Địa điểm: {{ $job->location->address }}</p> --}}
                        <p>Địa điểm: {{ $job->location ? $job->location->address : 'NA'}}</p>
                        <p>Mức lương: {{ $job->salary }}</p>
                        <a href="{{ route('job_seekr.job.details', $job->job_id) }}" class="btn btn-primary">Chi tiết</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
