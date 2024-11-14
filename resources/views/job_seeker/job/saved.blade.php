<h1>Công việc yêu thích của tôi</h1>
<ul>
    @foreach ($savedJobs as $job)
        <li>{{ $job->title }} - {{ $job->company->name }}</li>
    @endforeach
</ul>
