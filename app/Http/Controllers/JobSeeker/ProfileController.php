<?php


namespace App\Http\Controllers\JobSeeker;

use App\Models\JobSeeker;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        // Lấy thông tin người dùng hiện tại
        $user = auth()->user();

        // Kiểm tra vai trò của người dùng là 'job_seeker'
        if ($user->role === 'job_seeker') {
            // Tìm thông tin từ bảng job_seekers
            $jobSeeker = JobSeeker::where('user_id', $user->id)->first();

            return view('job_seeker.profile', compact('user', 'jobSeeker'));
        }

        return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:1024',
        ]);

        $user = auth()->user();

        if ($user->role === 'job_seeker') {
            $jobSeeker = JobSeeker::where('user_id', $user->id)->first();
            $jobSeeker->full_name = $request->full_name;

            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $jobSeeker->avatar = $avatarPath;
            }

            $jobSeeker->save();

            return back()->with('success', 'Thông tin cá nhân đã được cập nhật');
        }

        return redirect()->route('home')->with('error', 'Bạn không có quyền thực hiện thao tác này.');
    }
}
