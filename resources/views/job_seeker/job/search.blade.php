@extends('job_seeker.layouts.app')

@section('title', 'Kết quả tìm kiếm')

@section('content')
    <h1>Kết quả tìm kiếm</h1>

    @if($jobs->isEmpty())
        <p>Không tìm thấy công việc nào phù hợp.</p>
    @else
        @foreach($jobs as $job)
            <div class="job-card">
                <img src="{{ $job->company->logo }}" alt="Logo công ty">
                <h3>{{ $job->title }}</h3>
                <p>{{ $job->company->name }}</p>
                <p>{{ $job->salary }}</p>
                <p>{{ $job->location->address }}</p>
                <a href="{{ route('job.show', $job->id) }}">Xem chi tiết</a>
                <button>Ứng tuyển</button>
            </div>
        @endforeach
    @endif
@endsection
