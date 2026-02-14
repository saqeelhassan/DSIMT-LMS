@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h1 class="h3 mb-2 mb-sm-0">Defaulter List</h1>
        <p class="mb-0 text-body">Students with unpaid dues. You can disable their LMS access.</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body p-0">
                @if(session('success'))
                    <div class="alert alert-success mb-0 rounded-0 border-0 border-bottom">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Student</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Total Due</th>
                                <th>LMS access</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($defaulters as $inv)
                                @php $user = $inv->user; @endphp
                                <tr>
                                    <td>{{ $user?->name ?? '—' }}</td>
                                    <td>{{ $user?->email ?? '—' }}</td>
                                    <td>{{ $inv->enrollment?->course?->name ?? '—' }}</td>
                                    <td class="text-danger fw-bold">Rs {{ number_format($inv->balance, 0) }}</td>
                                    <td>
                                        @if($user?->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Disabled</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.invoices.show', $inv) }}" class="btn btn-sm btn-outline-primary">View invoice</a>
                                        @if($user?->is_active)
                                            <form method="post" action="{{ route('admin.defaulters.disable', $user) }}" class="d-inline" onsubmit="return confirm('Disable LMS access for this student?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Disable access</button>
                                            </form>
                                        @else
                                            <form method="post" action="{{ route('admin.defaulters.enable', $user) }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-success">Enable access</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center py-4 text-body">No defaulters.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
