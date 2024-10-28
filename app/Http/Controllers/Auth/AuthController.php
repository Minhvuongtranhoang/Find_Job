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

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'job_seeker'
        ]);

        JobSeeker::create([
            'seeker_id' => $user->id,
            'full_name' => $request->full_name
        ]);

        Auth::login($user);
        return redirect('/dashboard');
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
}
