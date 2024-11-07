<?php
namespace App\Http\Controllers\Admin;
use App\Models\Job;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class JobController extends Controller
{
    public function pending()
    {
      $jobs = Job::where('status', 'pending')->with(['company', 'location'])->paginate(10);
      return view('admin.jobs.pending', compact('jobs'));
    }

    public function approved(Job $job)
    {
      $job->update(['status' => 'approved']);

      //send notification to recruiter
      $job->company->recruiter->each(function ($recruiter) use ($job) {
        Notification::create([
          'user_id' => $recruiter->user_id,
          'title' => 'Job Posting Approved',
          'content' => "Your job posting '{$job->title}' has been approved."
        ]);
      });
      return redirect()->back()->with('success', 'Job approved successfully.');
    }

    public function rejected(Job $job)
    {
      $job->update(['status' => 'rejected']);

      //send notification to recruiter
      $job->company->recruiter->each(function ($recruiter) use ($job) {
        Notification::create([
          'user_id' => $recruiter->user_id,
          'title' => 'Job Posting Rejected',
          'content' => "Your job posting '{$job->title}' has been rejected."
        ]);
      });
      return redirect()->back()->with('success', 'Job rejected successfully.');
    }

    public function toggleFeatured(Job $job)
    {
      $job->update(['is_featured' => !$job->is_featured]);
      return redirect()->back()->with('success', 'Job featured status updated successfully.');
    }

    public function destroy(Job $job)
    {
      $job->delete();
      return redirect()->back()->with('success', 'Job deleted successfully.');
    }
}


