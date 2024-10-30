<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\JobSeeker;
use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
          $user = Auth::user();
          $token = $user->createToken('auth_token')->plainTextToken;

          return response()->json([
              'status' => 'success',
              'user' => $user,
              'token' => $token
          ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials'
        ], 401);
    }

    public function registerJobSeeker(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:20',
            'full_name' => 'required|string|max:255',
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::create([
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => 'job_seeker'
        ]);

        JobSeeker::create([
            'user_id' => $user->id,
            'full_name' => $validated['full_name']
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Registration successful',
            'user' => $user,
            'token' => $token
        ]);
    }

    public function registerRecruiter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => ['required', Password::defaults()],
            'phone' => 'required|string|max:20',
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string',
            'google_maps_link' => 'nullable|string|max:255'
        ]);

        // Create company
        $company = Company::create([
            'name' => $validated['company_name']
        ]);

        // Create company location
        $location = CompanyLocation::create([
            'company_id' => $company->id,
            'address' => $validated['company_address'],
            'google_maps_link' => $validated['google_maps_link']
        ]);

        // Create user
        $user = User::create([
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => 'recruiter'
        ]);

        // Create recruiter
        Recruiter::create([
            'user_id' => $user->id,
            'company_id' => $company->id
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Registration successful',
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logged out successfully'
        ]);
    }
}
