<?php

namespace App\Http\Controllers\JobSeeker;

use Illuminate\Routing\Controller;

use App\Models\Job;
use App\Models\SavedJob;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    public function searchJobs(Request $request)
    {
        $query = Job::with(['company', 'location', 'categories'])
            ->where('status', 'approved');

        if ($request->has('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }

        if ($request->has('category')) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        if ($request->has('location')) {
            $query->whereHas('location', function($q) use ($request) {
                $q->where('address', 'like', '%' . $request->location . '%');
            });
        }

        $jobs = $query->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $jobs
        ]);
    }

    public function getJobDetail($id)
    {
        $job = Job::with([
            'company',
            'location',
            'categories'
        ])->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $job
        ]);
    }

    public function toggleSaveJob(Request $request, $jobId)
    {
        $userId = Auth::id();
        $savedJob = SavedJob::where('user_id', $userId)
            ->where('job_id', $jobId)
            ->first();

        if ($savedJob) {
            $savedJob->delete();
            $message = 'Job removed from saved list';
        } else {
            SavedJob::create([
                'user_id' => $userId,
                'job_id' => $jobId
            ]);
            $message = 'Job saved successfully';
        }

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    public function applyJob(Request $request, $jobId)
    {
        $validated = $request->validate([
            'cv_file' => 'required|file|mimes:doc,docx,pdf|max:2048',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'cover_letter' => 'required|string'
        ]);

        $cvPath = $request->file('cv_file')->store('cvs', 'public');

        $application = JobApplication::create([
            'job_id' => $jobId,
            'user_id' => Auth::id(),
            'cv_file' => $cvPath,
            'cover_letter' => $validated['cover_letter'],
            'status' => 'pending'
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Application submitted successfully',
            'data' => $application
        ]);
    }

    public function getMyApplications()
    {
        $applications = JobApplication::with(['job.company'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $applications
        ]);
    }

    public function getSavedJobs()
    {
        $savedJobs = SavedJob::with(['job.company', 'job.location'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $savedJobs
        ]);
    }
}
