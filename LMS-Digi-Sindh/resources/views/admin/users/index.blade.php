@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 mb-sm-0">Users</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary mb-0">Back to Dashboard</a>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12">
        <p class="mb-0 text-body">
            @if(!empty($roleFilter))
                Showing {{ $roleFilter }} only.
            @else
                All users (Admins, Instructors, Students). Super Admin is managed separately.
            @endif
        </p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12">
        <div class="btn-group" role="group">
            <a href="{{ route('admin.users.index') }}" class="btn btn-{{ !request()->has('role') ? 'primary' : 'outline-primary' }}">All</a>
            @foreach($roles as $r)
                <a href="{{ route('admin.users.index', ['role' => $r->name]) }}" class="btn btn-{{ ($roleFilter ?? '') === $r->name ? 'primary' : 'outline-primary' }}">{{ $r->name }}</a>
            @endforeach
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Registered</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $u)
                                <tr>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        @php
                                            $badge = match($u->role?->name ?? '') {
                                                'Admin' => 'warning',
                                                'Instructor' => 'info',
                                                'Staff' => 'secondary',
                                                'Student' => 'primary',
                                                default => 'secondary',
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badge }}">{{ $u->role?->name ?? '—' }}</span>
                                    </td>
                                    <td>{{ $u->userDetail?->mobile ?? '—' }}</td>
                                    <td>
                                        @if($u->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Blocked</span>
                                        @endif
                                    </td>
                                    <td>{{ $u->created_at?->format('M j, Y') ?? '—' }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center py-4 text-body">No users found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($users->hasPages())
                    <div class="card-footer border-top py-2">
                        {{ $users->withQueryString()->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
