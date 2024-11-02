<?php

namespace App\Http\Controllers\Recruiter;

use Illuminate\Routing\Controller;

use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RecruiterController extends Controller
{
    public function updateCompanyInfo(Request $request)
    {
        $validated = $request->validate([
            'logo' => 'nullable|image|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'phone' => 'required|string|max:20',
            'description' => 'nullable|string',
            'industry' => 'required|string|max:255',
            'employee_count' => 'required|integer'
        ]);

        $company = Auth::user()->recruiter->company;

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Company information updated successfully',
            'data' => $company
        ]);
    }

    public function updateCompanyLocations(Request $request)
    {
        $validated = $request->validate([
            'locations' => 'required|array',
            'locations.*.address' => 'required|string',
            'locations.*.google_maps_link' => 'nullable|string|max:255'
        ]);

        $company = Auth::user()->recruiter->company;

        // Delete existing locations
        $company->locations()->delete();

        // Create new locations
        foreach ($validated['locations'] as $location) {
            CompanyLocation::create([
                'company_id' => $company->id,
                'address' => $location['address'],
                'google_maps_link' => $location['google_maps_link']
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Company locations updated successfully',
            'data' => $company->locations
        ]);
    }

    public function createJob(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location_id' => 'required|exists:company_locations,id',
            'deadline' => 'required|date',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'required|string',
            'working_hours' => 'required|string',
            'salary' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id'
        ]);

        $company = Auth::user()->recruiter->company;

        $job = Job::create([
            'company_id' => $company->id,
            'location_id' => $validated['location_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'requirements' => $validated['requirements'],
            'benefits' => $validated['benefits'],
            'working_hours' => $validated['working_hours'],
            'salary' => $validated['salary'],
            'deadline' => $validated['deadline'],
            'status' => 'pending'
        ]);

        $job->categories()->attach($validated['categories']);

        return response()->json([
            'status' => 'success',
            'message' => 'Job posted successfully',
            'data' => $job
        ]);
    }

    public function getMyJobs()
    {
        $company = Auth::user()->recruiter->company;

        $jobs = Job::with(['location', 'categories'])
            ->where('company_id', $company->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $jobs
        ]);
    }

    public function getJobApplications($jobId)
    {
        $applications = JobApplication::with(['user.jobSeeker'])
            ->where('job_id', $jobId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $applications
        ]);
    }

    public function updateApplicationStatus(Request $request, $applicationId)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'note' => 'nullable|string'
        ]);

        $application = JobApplication::findOrFail($applicationId);
        $application->update(['status' => $validated['status']]);

        // Create status history
        $application->statusHistory()->create([
            'status' => $validated['status'],
            'note' => $validated['note']
        ]);

        // Create notification for job seeker
        Notification::create([
            'user_id' => $application->user_id,
            'title' => 'Application Status Updated',
            'content' => "Your application for {$application->job->title} has been {$validated['status']}",
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Application status updated successfully'
        ]);
    }
}
