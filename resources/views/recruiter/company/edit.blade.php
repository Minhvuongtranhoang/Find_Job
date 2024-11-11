@extends('layouts.recruiter')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="h3 mb-4">Edit Company Information</h1>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('recruiter.company.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Company Logo</label>
                    <input type="file" name="logo" accept="image/*" class="form-control">
                    @if($company->logo)
                        <div class="mt-2">
                            <img src="{{ Storage::url($company->logo) }}" alt="Company Logo" class="img-fluid" style="max-height: 100px;">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="name" value="{{ old('name', $company->name) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $company->email) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Website</label>
                    <input type="url" name="website" value="{{ old('website', $company->website) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $company->phone) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Industry</label>
                    <input type="text" name="industry" value="{{ old('industry', $company->industry) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Employee Count</label>
                    <input type="number" name="employee_count" value="{{ old('employee_count', $company->employee_count) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="4" class="form-control">{{ old('description', $company->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Locations</label>
                    <div id="locations-container">
                        @foreach($company->locations as $location)
                            <div class="location-item mb-3 p-3 border rounded">
                                <input type="hidden" name="locations[{{ $loop->index }}][id]" value="{{ $location->id }}">
                                <div class="mb-2">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="locations[{{ $loop->index }}][address]" value="{{ $location->address }}" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Google Maps Link</label>
                                    <input type="url" name="locations[{{ $loop->index }}][google_maps_link]" value="{{ $location->google_maps_link }}" class="form-control">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-location" class="btn btn-outline-primary">
                        Add Location
                    </button>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">
                        Update Company
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('add-location').addEventListener('click', function() {
        const container = document.getElementById('locations-container');
        const index = container.children.length;

        const template = `
            <div class="location-item mb-3 p-3 border rounded">
                <div class="mb-2">
                    <label class="form-label">Address</label>
                    <input type="text" name="locations[${index}][address]" class="form-control">
                </div>
                <div class="mb-2">
                    <label class="form-label">Google Maps Link</label>
                    <input type="url" name="locations[${index}][google_maps_link]" class="form-control">
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', template);
    });
</script>
@endpush
@endsection
