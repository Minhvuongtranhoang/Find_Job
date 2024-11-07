@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Pending Job Posts</h1>

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
                <p class="text-gray-700"><strong>Deadline:</strong> {{ $job->deadline->format('M d, Y') }}</p>
            </div>

            <div class="flex justify-end space-x-2">
                <form action="{{ route('admin.jobs.approve', $job) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Approve</button>
                </form>
                <form action="{{ route('admin.jobs.reject', $job) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Reject</button>
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
