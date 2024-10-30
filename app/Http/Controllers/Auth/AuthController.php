<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\JobSeeker;
use App\Models\Recruiter;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registerJobSeeker(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone' => 'required',
            'full_name' => 'required'
        ]);

        // Bắt đầu transaction để đảm bảo tính nhất quán của dữ liệu
        DB::beginTransaction();

        try {
            // Tạo user mới
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'role' => 'job_seeker'
            ]);

            // Log thông tin user
            Log::info('New user registered', ['user_id' => $user->id, 'email' => $user->email]);

            // Tạo job seeker profile
            $jobSeeker = new JobSeeker();
            $jobSeeker->seeker_id = $user->id; // Gán ID của user làm seeker_id
            $jobSeeker->full_name = $request->full_name;
            $jobSeeker->save();

            // Log thông tin job seeker
            Log::info('New job seeker registered', [
                'seeker_id' => $jobSeeker->seeker_id,
                'full_name' => $jobSeeker->full_name
            ]);

            // Nếu mọi thứ OK, commit transaction
            DB::commit();

            // Login user
            Auth::login($user);

            return redirect('/dashboard')->with('success', 'Đăng ký thành công!');

        } catch (\Exception $e) {
            // Nếu có lỗi, rollback transaction
            DB::rollBack();

            Log::error('Registration failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withInput()
                ->withErrors(['error' => 'Đăng ký thất bại. Vui lòng thử lại.']);
        }
    }

    public function registerRecruiter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone' => 'required',
            'company_name' => 'required',
            'location' => 'required'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'recruiter'
        ]);

        $company = Company::create([
            'company_name' => $request->company_name
        ]);

        $company->locations()->create([
            'address' => $request->location
        ]);

        Recruiter::create([
            'recruiter_id' => $user->id,
            'company_id' => $company->id
        ]);

        Auth::login($user);
        return redirect('/dashboard');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        // Generate password reset token and send email
        // Implementation here...
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        // Reset password implementation
        // Implementation here...
    }

    public function showJobSeekerRegistrationForm()
    {
        return view('auth.register.job-seeker');
    }

    public function showRecruiterRegistrationForm()
    {
        return view('auth.register.recruiter');
    }
}
