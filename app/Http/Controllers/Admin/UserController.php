<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::with(['jobSeeker', 'recruiter.company'])->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required'
        ]);

        $user->update($request->only(['email', 'phone']));
        return back()->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }
}
