<?php

namespace App\Http\Controllers\Recruiter;

use Illuminate\Routing\Controller;
use App\Models\JobApplication;
use App\Models\ApplicationStatusHistory;
use App\Models\Notification;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $applications = auth()->guard('web')->user()->recruiter->company->jobs()
            ->with(['applications' => function($query) {
                $query->with(['jobSeeker.user', 'statusHistory']);
            }])
            ->get()
            ->pluck('applications')
            ->flatten();

        return view('recruiter.applications.index', compact('applications'));
    }

    public function updateStatus(Request $request, JobApplication $application)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'note' => 'nullable|string'
        ]);

        $application->update(['status' => $request->status]);

        // Create status history
        ApplicationStatusHistory::create([
            'application_id' => $application->id,
            'status' => $request->status,
            'note' => $request->note
        ]);

        // Create notification for job seeker
        Notification::create([
            'user_id' => $application->jobSeeker->user->id,
            'title' => 'Application Status Updated',
            'content' => "Your application for {$application->job->title} has been {$request->status}"
        ]);

        return back()->with('success', 'Application status updated successfully');
    }

    public function downloadCV(JobApplication $application)
    {
        $this->authorize('download', $application);
        return response()->download(storage_path('app/public/' . $application->cv_file));
    }
}
