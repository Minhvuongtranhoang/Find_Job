@extends('layouts.recruiter')

@section('content')
<div class="container mx-auto px-0 py-8">
    <div class="bg-white">
        <h1 class="text-2xl font-bold mb-6">Edit Company Information</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('recruiter.company.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Company Logo</label>
                <input type="file" name="logo" accept="image/*" class="form-input">
                @if($company->logo)
                    <div class="mt-2">
                        <img src="{{ Storage::url($company->logo) }}" alt="Company Logo" class="h-20 w-auto">
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Company Name</label>
                <input type="text" name="name" value="{{ old('name', $company->name) }}" class="form-input w-full">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $company->email) }}" class="form-input w-full">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Website</label>
                <input type="url" name="website" value="{{ old('website', $company->website) }}" class="form-input w-full">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $company->phone) }}" class="form-input w-full">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Industry</label>
                <input type="text" name="industry" value="{{ old('industry', $company->industry) }}" class="form-input w-full">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Employee Count</label>
                <input type="number" name="employee_count" value="{{ old('employee_count', $company->employee_count) }}" class="form-input w-full">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" rows="4" class="form-textarea w-full">{{ old('description', $company->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Locations</label>
                <div id="locations-container">
                    @foreach($company->locations as $location)
                        <div class="location-item mb-4 p-4 border rounded">
                            <input type="hidden" name="locations[{{ $loop->index }}][id]" value="{{ $location->id }}">
                            <div class="mb-2">
                                <label>Address</label>
                                <input type="text" name="locations[{{ $loop->index }}][address]"
                                       value="{{ $location->address }}" class="form-input w-full">
                            </div>
                            <div class="mb-2">
                                <label>Google Maps Link</label>
                                <input type="url" name="locations[{{ $loop->index }}][google_maps_link]"
                                       value="{{ $location->google_maps_link }}" class="form-input w-full">
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="add-location" class="bg-blue-500 text-blue px-4 py-2 rounded">
                    Add Location
                </button>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-blue px-6 py-2 rounded">
                    Update Company
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('add-location').addEventListener('click', function() {
        const container = document.getElementById('locations-container');
        const index = container.children.length;

        const template = `
            <div class="location-item mb-4 p-4 border rounded">
                <div class="mb-2">
                    <label>Address</label>
                    <input type="text" name="locations[${index}][address]" class="form-input w-full">
                </div>
                <div class="mb-2">
                    <label>Google Maps Link</label>
                    <input type="url" name="locations[${index}][google_maps_link]" class="form-input w-full">
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', template);
    });
</script>
@endpush
@endsection
