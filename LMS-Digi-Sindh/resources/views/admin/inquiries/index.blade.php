@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 mb-sm-0">Inquiries</h1>
        <a href="{{ route('admin.inquiries.create') }}" class="btn btn-sm btn-primary mb-0">Add inquiry</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header border-bottom p-4">
                <form method="get" action="{{ route('admin.inquiries.index') }}" class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All statuses</option>
                            <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="converted" {{ request('status') === 'converted' ? 'selected' : '' }}>Converted</option>
                            <option value="lost" {{ request('status') === 'lost' ? 'selected' : '' }}>Lost</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="card-body p-0">
                @if(session('success'))
                    <div class="alert alert-success mb-0 rounded-0 border-0 border-bottom">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Course interest</th>
                                <th>Status</th>
                                <th>Assigned to</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($inquiries as $inq)
                                <tr>
                                    <td>{{ $inq->name }}</td>
                                    <td>{{ $inq->phone ?? '—' }}</td>
                                    <td>{{ $inq->email ?? '—' }}</td>
                                    <td>{{ $inq->course_interest ?? '—' }}</td>
                                    <td>
                                        @if($inq->status === 'converted')
                                            <span class="badge bg-success">Converted</span>
                                        @elseif($inq->status === 'contacted')
                                            <span class="badge bg-info">Contacted</span>
                                        @elseif($inq->status === 'lost')
                                            <span class="badge bg-secondary">Lost</span>
                                        @else
                                            <span class="badge bg-warning">New</span>
                                        @endif
                                    </td>
                                    <td>{{ $inq->assignee?->name ?? '—' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.inquiries.edit', $inq) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        @if($inq->status !== 'converted')
                                            <a href="{{ route('admin.inquiries.convert', $inq) }}" class="btn btn-sm btn-outline-success">Convert</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="7" class="text-center py-4 text-body">No inquiries yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($inquiries->hasPages())
                    <div class="card-footer border-top py-2">
                        {{ $inquiries->withQueryString()->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
