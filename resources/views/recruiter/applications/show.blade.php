@extends('layouts.recruiter')

@section('content')
<div class="container mx-auto px-0 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Application Details</h1>
            <div>
                <a href="{{ route('recruiter.applications.download-cv', $application) }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded mr-2">
                    Download CV
                </a>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Applicant Information</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">Name</p>
                    <p class="font-medium">{{ $application->user->jobSeeker->full_name }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Email</p>
                    <p class="font-medium">{{ $application->user->email }}</p>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Job Information</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">Position</p>
                    <p class="font-medium">{{ $application->job->title }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Applied Date</p>
                    <p class="font-medium">{{ $application->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>

        @if($application->cover_letter)
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Cover Letter</h2>
                <div class="bg-gray-50 p-4 rounded">
                    {{ $application->cover_letter }}
                </div>
            </div>
        @endif

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Application Status</h2>
            <form action="{{ route('recruiter.applications.update-status', $application) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Update Status</label>
                    <select name="status" class="form-select w-full">
                        <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>
                            Pending Review
                        </option>
                        <option value="approved" {{ $application->status === 'approved' ? 'selected' : '' }}>
                            Approve
                        </option>
                        <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>
                            Reject
                        </option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Note</label>
                    <textarea name="note" rows="3" class="form-textarea w-full"></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded">
                        Update Status
                    </button>
                </div>
            </form>
        </div>

        @if($application->statusHistory->count() > 0)
            <div>
                <h2 class="text-xl font-semibold mb-4">Status History</h2>
                <div class="space-y-4">
                    @foreach($application->statusHistory as $history)
                        <div class="bg-gray-50 p-4 rounded">
                            <div class="flex justify-between items-center">
                                <span class="font-medium">{{ ucfirst($history->status) }}</span>
                                <span class="text-sm text-gray-500">
                                    {{ $history->created_at->format('M d, Y H:i') }}
                                </span>
                            </div>
                            @if($history->note)
                                <p class="text-gray-600 mt-2">{{ $history->note }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
