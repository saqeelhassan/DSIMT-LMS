<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a read-only listing of users (for admin dashboard "View all users").
     */
    public function index(Request $request): View
    {
        $query = User::with(['role', 'userDetail'])
            ->whereHas('role', fn ($q) => $q->where('name', '!=', 'SuperAdmin'))
            ->orderBy('created_at', 'desc');

        $roleFilter = $request->get('role');
        if ($roleFilter) {
            $query->whereHas('role', fn ($q) => $q->where('name', $roleFilter));
        }

        $users = $query->paginate(15)->withQueryString();
        $roles = Role::whereIn('name', ['Admin', 'Instructor', 'Student'])->where('is_active', true)->orderBy('name')->get();

        return view('admin.users.index', compact('users', 'roles', 'roleFilter'));
    }
}
