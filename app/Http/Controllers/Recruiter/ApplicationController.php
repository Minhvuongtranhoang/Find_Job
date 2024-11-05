<?php

namespace App\Http\Controllers\Recruiter;

use Illuminate\Routing\Controller;
use App\Models\JobApplication;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApplicationController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $user = Auth::user();
        if(!$user || !$user->recruiter) {
            return redirect()->route('login')->withErrors("you must be logged in to view this page");
        }
        $applications = JobApplication::whereHas('job', function ($query) {
                return $query->where('company_id', Auth::user()->recruiter->company_id);
            })
            ->with(['user.jobSeeker', 'job'])
            ->latest()
            ->paginate(15);

        return view('recruiter.applications.index', compact('applications'));
    }

    public function show(JobApplication $application)
    {
        $this->authorize('view', $application);
        return view('recruiter.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, JobApplication $application)
    {
        $this->authorize('update', $application);

        $request->validate([
            'status' => 'required|in:approved,rejected',
            'note' => 'nullable|string|max:500'
        ]);

        $application->update(['status' => $request->status]);

        // Create status history
        $application->statusHistory()->create([
            'status' => $request->status,
            'note' => $request->note
        ]);

        // Create notification for job seeker
        $title = $request->status === 'approved'
            ? 'Application Approved'
            : 'Application Rejected';

        $content = $request->status === 'approved'
            ? "Your application for {$application->job->title} has been approved!"
            : "Your application for {$application->job->title} has been rejected.";

        Notification::create([
            'user_id' => $application->user_id,
            'title' => $title,
            'content' => $content
        ]);

        return redirect()->route('recruiter.applications.index')
            ->with('success', 'Application status updated successfully.');
    }

    public function downloadCV(JobApplication $application)
    {
        $this->authorize('view', $application);
        return Storage::download($application->cv_file);
    }
}
