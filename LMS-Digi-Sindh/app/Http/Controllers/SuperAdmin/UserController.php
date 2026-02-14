<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\AdminPermission;
use App\Models\AuditLog;
use App\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function create(): View
    {
        $roles = Role::whereIn('name', ['Admin', 'Instructor', 'Student'])->orderBy('name')->get();
        $adminPermissions = config('admin_permissions', []);

        return view('super-admin.users.create', compact('roles', 'adminPermissions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'mobile' => ['nullable', 'string', 'max:20'],
            'role' => ['required', 'string', 'in:Admin,Instructor,Student'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['string', 'in:'.implode(',', array_keys(config('admin_permissions', [])))],
        ], [
            'email.unique' => 'An account with this email already exists.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters.',
        ]);

        $role = Role::where('name', $validated['role'])->where('is_active', true)->first();
        if (! $role) {
            return back()->withErrors(['role' => 'Invalid role selected.'])->withInput();
        }

        $user = User::create([
            'email' => strtolower(trim($validated['email'])),
            'password' => $validated['password'],
            'role_id' => $role->id,
            'is_active' => true,
        ]);

        UserDetail::create([
            'user_id' => $user->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'mobile' => $validated['mobile'] ?? null,
        ]);

        if ($validated['role'] === 'Admin' && ! empty($validated['permissions'])) {
            foreach ($validated['permissions'] as $permission) {
                AdminPermission::create(['user_id' => $user->id, 'permission' => $permission]);
            }
        }

        return redirect()->route('super-admin.users.index')->with('success', "User created successfully: {$user->email} as {$role->name}");
    }

    public function edit(User $user): View
    {
        if ($user->role?->name === 'SuperAdmin') {
            abort(403, 'Super Admin users cannot be edited from the panel. They are managed in code only.');
        }

        $user->load(['role', 'userDetail', 'adminPermissions']);
        $roles = Role::whereIn('name', ['Admin', 'Instructor', 'Student'])->orderBy('name')->get();
        $adminPermissions = config('admin_permissions', []);

        return view('super-admin.users.edit', compact('user', 'roles', 'adminPermissions'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        if ($user->role?->name === 'SuperAdmin') {
            abort(403, 'Super Admin users cannot be edited from the panel.');
        }

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'mobile' => ['nullable', 'string', 'max:20'],
            'role' => ['required', 'string', 'in:Admin,Instructor,Student'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['string', 'in:'.implode(',', array_keys(config('admin_permissions', [])))],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:2048'],
        ], [
            'profile_picture.max' => 'The profile picture must not be larger than 2 MB.',
        ]);

        $role = Role::where('name', $validated['role'])->where('is_active', true)->first();
        if (! $role) {
            return back()->withErrors(['role' => 'Invalid role selected.'])->withInput();
        }

        $detailData = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'mobile' => $validated['mobile'] ?? null,
        ];

        if ($request->hasFile('profile_picture')) {
            $detail = $user->userDetail ?? new UserDetail(['user_id' => $user->id]);
            if ($detail->profile_picture && Storage::disk('public')->exists($detail->profile_picture)) {
                Storage::disk('public')->delete($detail->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $detailData['profile_picture'] = $path;
        }

        UserDetail::updateOrCreate(
            ['user_id' => $user->id],
            $detailData
        );

        $user->update(['role_id' => $role->id]);

        // Sync admin permissions: only for Admin role; others get permissions removed
        $user->adminPermissions()->delete();
        if ($validated['role'] === 'Admin' && ! empty($validated['permissions'])) {
            foreach ($validated['permissions'] as $permission) {
                AdminPermission::create(['user_id' => $user->id, 'permission' => $permission]);
            }
        }

        Cache::forget("user.{$user->id}.admin_permissions");

        return redirect()->route('super-admin.users.index')->with('success', "User updated: {$user->email}");
    }

    public function assignRole(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'role' => ['required', 'string', 'in:Admin,Instructor,Student'],
        ]);

        $role = Role::where('name', $validated['role'])->where('is_active', true)->first();
        if (! $role) {
            return back()->withErrors(['role' => 'Invalid role selected.']);
        }

        $user->update(['role_id' => $role->id]);

        if ($validated['role'] !== 'Admin') {
            $user->adminPermissions()->delete();
            Cache::forget("user.{$user->id}.admin_permissions");
        }

        return back()->with('success', "Role updated: {$user->email} is now {$role->name}");
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === auth()->id()) {
            return back()->withErrors(['user' => 'You cannot delete your own account.']);
        }

        if ($user->role?->name === 'SuperAdmin') {
            abort(403, 'Super Admin users cannot be deleted from the panel.');
        }

        $user->adminPermissions()->delete();
        Cache::forget("user.{$user->id}.admin_permissions");
        AuditLog::log('user_deleted', User::class, $user->id, auth()->user()->name . " deleted user {$user->email} ({$user->name})");
        $user->delete();

        return redirect()->route('super-admin.users.index')->with('success', "User deleted: {$user->email}");
    }

    public function block(User $user): RedirectResponse
    {
        if ($user->id === auth()->id()) {
            return back()->withErrors(['user' => 'You cannot block your own account.']);
        }
        if ($user->role?->name === 'SuperAdmin') {
            abort(403, 'Super Admin users cannot be blocked.');
        }
        $user->update(['is_active' => false]);
        AuditLog::log('user_blocked', User::class, $user->id, auth()->user()->name . " blocked {$user->email} ({$user->name})");
        return back()->with('success', "User blocked: {$user->email}");
    }

    public function unblock(User $user): RedirectResponse
    {
        if ($user->role?->name === 'SuperAdmin') {
            abort(403, 'Super Admin users cannot be modified.');
        }
        $user->update(['is_active' => true]);
        AuditLog::log('user_unblocked', User::class, $user->id, auth()->user()->name . " unblocked {$user->email} ({$user->name})");
        return back()->with('success', "User unblocked: {$user->email}");
    }

    public function index(Request $request): View
    {
        $roleFilter = $request->get('role');

        $query = User::with(['role', 'userDetail', 'adminPermissions'])
            ->whereHas('role', fn ($q) => $q->where('name', '!=', 'SuperAdmin'))
            ->orderBy('created_at', 'desc');

        if ($roleFilter && in_array($roleFilter, ['Student', 'Instructor', 'Admin'], true)) {
            $query->whereHas('role', fn ($q) => $q->where('name', $roleFilter));
        }

        $users = $query->paginate(15)->withQueryString();

        $roles = Role::whereIn('name', ['Admin', 'Instructor', 'Student'])->orderBy('name')->get();
        $adminPermissionLabels = config('admin_permissions', []);

        return view('super-admin.users.index', compact('users', 'roles', 'roleFilter', 'adminPermissionLabels'));
    }
}
