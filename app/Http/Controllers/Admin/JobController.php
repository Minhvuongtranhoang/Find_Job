<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Job;
use App\Models\Notification;
use Illuminate\Http\Request;

class JobController extends BaseController
{
    public function pendingJobs()
    {
        $jobs = Job::where('status', 'pending')
            ->with(['company', 'location'])
            ->paginate(15);
        return view('admin.jobs.pending', compact('jobs'));
    }

    public function approvedJobs()
    {
        $jobs = Job::where('status', 'approved')
            ->with(['company', 'location'])
            ->paginate(15);
        return view('admin.jobs.approved', compact('jobs'));
    }

    public function updateStatus(Request $request, Job $job)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $job->update(['status' => $request->status]);

        // Notify recruiter
        Notification::create([
            'user_id' => $job->company->recruiters->first()->user->id,
            'title' => 'Job Post Status Updated',
            'content' => "Your job post '{$job->title}' has been {$request->status}"
        ]);

        return back()->with('success', 'Job status updated successfully');
    }

    public function toggleFeatured(Job $job)
    {
        $job->update(['is_featured' => !$job->is_featured]);
        return back()->with('success', 'Job featured status updated successfully');
    }
}
