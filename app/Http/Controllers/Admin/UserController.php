<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:super_admin,admin,editor',
            'title' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'title' => $validated['title'] ?? 'Administrator',
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', "Admin user '{$validated['name']}' created successfully.");
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:super_admin,admin,editor',
            'title' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
        ]);

        // Guard against removing the only super admin
        if ($user->role === 'super_admin' && $validated['role'] !== 'super_admin') {
            $otherSuperAdmins = User::where('role', 'super_admin')->where('id', '!=', $user->id)->count();
            if ($otherSuperAdmins === 0) {
                return back()->withErrors(['role' => 'Cannot demote the only Super Administrator on the system.']);
            }
        }

        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'title' => $validated['title'] ?? $user->title,
            'is_active' => $request->has('is_active'),
        ];

        if (!empty($validated['password'])) {
            $userData['password'] = Hash::make($validated['password']);
        }

        $user->update($userData);

        return redirect()->route('admin.users.index')
            ->with('success', "Admin user '{$user->name}' updated successfully.");
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->withErrors(['error' => 'You cannot terminate your own active administrator session.']);
        }

        if ($user->role === 'super_admin') {
            $otherSuperAdmins = User::where('role', 'super_admin')->where('id', '!=', $user->id)->count();
            if ($otherSuperAdmins === 0) {
                return back()->withErrors(['error' => 'Cannot delete the only Super Administrator on the system.']);
            }
        }

        $name = $user->name;
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', "Admin user '{$name}' deleted.");
    }
}

