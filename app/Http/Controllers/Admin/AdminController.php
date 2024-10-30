<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

use App\Models\User;
use App\Models\Job;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getUsers(Request $request)
    {
        $query = User::query();

        if ($request->has('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->with(['jobSeeker', 'recruiter.company'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $users
        ]);
    }

    public function updateUser(Request $request, $userId)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $userId,
            'phone' => 'required|string|max:20',
            'role' => 'required|in:job_seeker,recruiter,admin'
        ]);

        $user = User::findOrFail($userId);
        $user->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully',
            'data' => $user
        ]);
    }

    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);

        // Xử lý xóa user theo role
        switch($user->role) {
            case 'job_seeker':
                // Xóa các đơn ứng tuyển và công việc đã lưu
                DB::transaction(function() use ($user) {
                    $user->jobApplications()->delete();
                    $user->savedJobs()->delete();
                    $user->jobSeeker()->delete();
                    $user->delete();
                });
                break;

            case 'recruiter':
                // Xóa các bài đăng việc làm và thông tin công ty
                DB::transaction(function() use ($user) {
                    $company = $user->recruiter->company;
                    $company->jobs()->delete();
                    $company->locations()->delete();
                    $user->recruiter()->delete();
                    $company->delete();
                    $user->delete();
                });
                break;

            default:
                $user->delete();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully'
        ]);
    }

    // Phương thức lấy danh sách bài đăng chờ duyệt
    public function getPendingJobs()
    {
        $jobs = Job::with(['company', 'location', 'categories'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $jobs
        ]);
    }

    // Phương thức lấy danh sách bài đăng đã duyệt
    public function getApprovedJobs()
    {
        $jobs = Job::with(['company', 'location', 'categories'])
            ->where('status', 'approved')
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $jobs
        ]);
    }

    // Phương thức xét duyệt bài đăng
    public function reviewJob(Request $request, $jobId)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'reason' => 'required_if:status,rejected|nullable|string'
        ]);

        $job = Job::findOrFail($jobId);
        $job->update([
            'status' => $validated['status']
        ]);

        // Tạo thông báo cho nhà tuyển dụng
        $notification = new Notification([
            'user_id' => $job->company->recruiters->first()->user_id,
            'title' => 'Job Post Review Update',
            'content' => $validated['status'] === 'approved'
                ? "Your job post '{$job->title}' has been approved and is now live."
                : "Your job post '{$job->title}' has been rejected. Reason: {$validated['reason']}"
        ]);
        $notification->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Job review completed successfully'
        ]);
    }

    // Phương thức gắn/gỡ nhãn nổi bật cho bài đăng
    public function toggleFeatured($jobId)
    {
        $job = Job::findOrFail($jobId);

        $job->update([
            'is_featured' => !$job->is_featured
        ]);

        // Tạo thông báo cho nhà tuyển dụng
        $notification = new Notification([
            'user_id' => $job->company->recruiters->first()->user_id,
            'title' => 'Job Featured Status Update',
            'content' => $job->is_featured
                ? "Your job post '{$job->title}' has been marked as featured."
                : "Your job post '{$job->title}' is no longer featured."
        ]);
        $notification->save();

        return response()->json([
            'status' => 'success',
            'message' => $job->is_featured
                ? 'Job marked as featured successfully'
                : 'Job unmarked as featured successfully'
        ]);
    }

    // Phương thức xóa bài đăng
    public function deleteJob($jobId)
    {
        $job = Job::findOrFail($jobId);

        // Xóa tất cả dữ liệu liên quan
        DB::transaction(function() use ($job) {
            // Xóa các đơn ứng tuyển
            $job->jobApplications()->delete();
            // Xóa các lưu trữ
            $job->savedJobs()->delete();
            // Xóa liên kết với categories
            $job->categories()->detach();
            // Xóa job
            $job->delete();
        });

        // Tạo thông báo cho nhà tuyển dụng
        $notification = new Notification([
            'user_id' => $job->company->recruiters->first()->user_id,
            'title' => 'Job Post Deleted',
            'content' => "Your job post '{$job->title}' has been deleted by administrator."
        ]);
        $notification->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Job deleted successfully'
        ]);
    }

    // Phương thức lấy thống kê tổng quan
    public function getDashboardStats()
    {
        $stats = [
            'total_users' => [
                'job_seekers' => User::where('role', 'job_seeker')->count(),
                'recruiters' => User::where('role', 'recruiter')->count()
            ],
            'jobs' => [
                'pending' => Job::where('status', 'pending')->count(),
                'approved' => Job::where('status', 'approved')->count(),
                'rejected' => Job::where('status', 'rejected')->count(),
                'featured' => Job::where('is_featured', true)->count()
            ],
            'recent_activity' => [
                'new_users' => User::orderBy('created_at', 'desc')
                    ->take(5)
                    ->get(),
                'new_jobs' => Job::with('company')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get()
            ]
        ];

        return response()->json([
            'status' => 'success',
            'data' => $stats
        ]);
    }
}
