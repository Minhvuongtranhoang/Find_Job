@extends('layouts.recruiter')

@section('content')
<div class="container mx-auto px-0 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Job</h1>

        <form action="{{ route('recruiter.jobs.update', $job->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Job Title</label>
                <input type="text" name="title" value="{{ old('title', $job->title) }}"
                       class="form-input w-full @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                <select name="location_id" class="form-select w-full @error('location_id') border-red-500 @enderror">
                    <option value="">Select Location</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location_id', $job->location_id) == $location->id ? 'selected' : '' }}>
                            {{ $location->address }}
                        </option>
                    @endforeach
                </select>
                @error('location_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Application Deadline</label>
                <input type="date" name="deadline" value="{{ old('deadline', $job->deadline) }}"
                       class="form-input w-full @error('deadline') border-red-500 @enderror">
                @error('deadline')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Job Description</label>
                <textarea name="description" rows="4"
                          class="form-textarea w-full @error('description') border-red-500 @enderror">{{ old('description', $job->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Requirements</label>
                <textarea name="requirements" rows="4"
                          class="form-textarea w-full @error('requirements') border-red-500 @enderror">{{ old('requirements', $job->requirements) }}</textarea>
                @error('requirements')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Benefits</label>
                <textarea name="benefits" rows="4"
                          class="form-textarea w-full @error('benefits') border-red-500 @enderror">{{ old('benefits', $job->benefits) }}</textarea>
                @error('benefits')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Working Hours</label>
                <input type="text" name="working_hours" value="{{ old('working_hours', $job->working_hours) }}"
                       class="form-input w-full @error('working_hours') border-red-500 @enderror">
                @error('working_hours')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Salary</label>
                <input type="text" name="salary" value="{{ old('salary', $job->salary) }}"
                       class="form-input w-full @error('salary') border-red-500 @enderror">
                @error('salary')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">
                    Update Job
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
