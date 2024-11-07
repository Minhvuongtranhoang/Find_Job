<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\User;
use App\Models\JobSeeker;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['jobSeeker', 'recruiter.company'])->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'full_name' => 'required_if:role,job_seeker',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:job_seeker,recruiter',
        'phone' => 'nullable|string',
        'company_id' => 'required_if:role,recruiter'
      ]);

      $user = User::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'role' => $request->role
      ]);

      if($request->role === 'job_seeker') {
        JobSeeker::create([
          'user_id' => $user->id,
          'full_name' => $request->full_name
        ]);
      } else {
        Recruiter::create([
          'user_id' => $user->id,
          'company_id' => $request->company_id
        ]);
      }
      return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
      $request->validate([
        'email' => 'required|email|unique:users,email,'.$user->id,
        'phone' => 'nullable|string',
        'company_id' => 'required_if:role,recruiter',
        'full_name' => 'required_if:role,job_seeker'
      ]);

      $user->update([
        'email' => $request->email,
        'phone' => $request->phone
      ]);

      if ($user->role === 'job_seeker' && $user->jobSeeker) {
        $user->jobSeeker->update([
          'full_name' => $request->full_name
        ]);
      } elseif ($user->role === 'recruiter' && $user->recruiter) {
        $user->recruiter->update([
          'company_id' => $request->company_id
        ]);
      }
      return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
