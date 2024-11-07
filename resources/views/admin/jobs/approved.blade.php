@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Approved Job Posts</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($jobs as $job)
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center mb-4">
                <img src="{{ $job->company->logo }}" alt="{{ $job->company->name }}" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <h2 class="font-bold">{{ $job->title }}</h2>
                    <p class="text-gray-600">{{ $job->company->name }}</p>
                </div>
            </div>

            <div class="mb-4">
                <p class="text-gray-700"><strong>Location:</strong> {{ $job->location->address }}</p>
                <p class="text-gray-700"><strong>Salary:</strong> {{ $job->salary }}</p>
                <p class="text-gray-700"><strong>Applications:</strong> {{ $job->jobApplications->count() }}</p>
            </div>

            <div class="flex justify-between items-center">
                <form action="{{ route('admin.jobs.toggleFeatured', $job) }}" method="POST">
                    @csrf
                    <button type="submit" class="text-yellow-500 hover:text-yellow-600">
                        @if($job->is_featured)
                            <i class="fas fa-star"></i> Featured
                        @else
                            <i class="far fa-star"></i> Make Featured
                        @endif
                    </button>
                </form>

                <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('Are you sure?')">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</div>
@endsection
