@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12 mb-3">
        <h1 class="h3 mb-2 mb-sm-0">Pending registrations</h1>
        <p class="mb-0 text-body">Approve or reject Staff and Student sign-ups.</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header border-bottom p-4 d-flex justify-content-between align-items-center">
                <h5 class="card-header-title mb-0">Awaiting approval</h5>
                @if($pendingRegistrations->count() > 0)
                    <span class="badge bg-warning">{{ $pendingRegistrations->count() }} awaiting</span>
                @endif
            </div>
            <div class="card-body p-0">
                @if(session('success'))
                    <div class="alert alert-success mb-0 rounded-0 border-0 border-bottom">{{ session('success') }}</div>
                @endif
                @if($pendingRegistrations->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Mobile</th>
                                    <th>Registered</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingRegistrations as $u)
                                    <tr>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td><span class="badge bg-secondary">{{ $u->role?->name ?? '—' }}</span></td>
                                        <td>{{ $u->userDetail?->mobile ?? '—' }}</td>
                                        <td>{{ $u->created_at?->format('M j, Y H:i') ?? '—' }}</td>
                                        <td class="text-end">
                                            <form method="post" action="{{ route('admin.registrations.approve', $u) }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                            </form>
                                            <form method="post" action="{{ route('admin.registrations.reject', $u) }}" class="d-inline" onsubmit="return confirm('Reject and remove this registration?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="mb-0 p-4 text-body">No pending registrations.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
