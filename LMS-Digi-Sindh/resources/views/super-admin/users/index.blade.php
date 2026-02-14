@extends('layouts.super-admin')

@section('content')
<div class="row">
    <div class="col-12 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h1 class="h3 mb-2 mb-sm-0">Users</h1>
            <p class="mb-0 text-body">
                @if($roleFilter)
                    Showing {{ $roleFilter }} only.
                @else
                    Admins, instructors, and students. Super Admin is managed in code only.
                @endif
            </p>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('super-admin.users.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Add Admin / Add User</a>
            <a href="{{ route('super-admin.users.create', ['role' => 'Instructor']) }}" class="btn btn-info"><i class="bi bi-person-plus me-1"></i>Add Instructor</a>
        </div>
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0 list-unstyled small">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success mb-4">{{ session('success') }}</div>
@endif

<!-- Filter -->
<div class="row mb-4">
    <div class="col-12">
        <div class="btn-group" role="group">
            <a href="{{ route('super-admin.users.index') }}" class="btn btn-{{ !request()->has('role') ? 'primary' : 'outline-primary' }}">All</a>
            @foreach($roles as $r)
                <a href="{{ route('super-admin.users.index', ['role' => $r->name]) }}" class="btn btn-{{ $roleFilter === $r->name ? 'primary' : 'outline-primary' }}">{{ $r->name }}</a>
            @endforeach
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body p-0">
                <div class="table-responsive border-0">
                    <table class="table table-hover align-middle border-0 mb-0">
<thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Access (Admin)</th>
                                    <th>Mobile</th>
                                    <th>Registered</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                        <tbody>
                            @forelse($users as $u)
                                <tr>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        @php
                                            $badge = match($u->role?->name) {
                                                'SuperAdmin' => 'danger',
                                                'Admin' => 'warning',
                                                'Instructor' => 'info',
                                                'Staff' => 'secondary',
                                                'Student' => 'primary',
                                                default => 'secondary',
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badge }}">{{ $u->role?->name ?? '—' }}</span>
                                        @if(!$u->is_active)
                                            <span class="badge bg-danger ms-1">Blocked</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($u->role?->name === 'Admin' && $u->adminPermissions->isNotEmpty())
                                            <span class="small">{{ $u->adminPermissions->pluck('permission')->join(', ') }}</span>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>{{ $u->userDetail?->mobile ?? '—' }}</td>
                                    <td>{{ $u->created_at?->format('M j, Y') ?? '—' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('super-admin.users.edit', $u) }}" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                                        @if($u->role?->name !== 'SuperAdmin' && $u->id !== auth()->id())
                                            @if($u->is_active)
                                                <form method="post" action="{{ route('super-admin.users.block', $u) }}" class="d-inline" onsubmit="return confirm('Block this user? They will not be able to log in.');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger me-1">Block</button>
                                                </form>
                                            @else
                                                <form method="post" action="{{ route('super-admin.users.unblock', $u) }}" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-success me-1">Unblock</button>
                                                </form>
                                            @endif
                                        @endif
                                        <form method="post" action="{{ route('super-admin.users.assign-role', $u) }}" class="d-inline">
                                            @csrf
                                            <div class="input-group input-group-sm" style="min-width:140px;">
                                                <select name="role" class="form-select form-select-sm" onchange="this.form.submit()">
                                                    @foreach($roles as $r)
                                                        <option value="{{ $r->name }}" {{ $u->role?->name === $r->name ? 'selected' : '' }}>{{ $r->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                        <form method="post" action="{{ route('super-admin.users.destroy', $u) }}" class="d-inline ms-1" onsubmit="return confirm('Delete this user? This cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-body">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($users->hasPages())
                <div class="card-footer border-top py-2">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
