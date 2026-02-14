@extends('layouts.admin')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-sm-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 mb-sm-0">Broadcasts</h1>
        <a href="{{ route('admin.broadcasts.create') }}" class="btn btn-sm btn-primary mb-0">Send broadcast</a>
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
                                <th>Title</th>
                                <th>Message</th>
                                <th>Channel</th>
                                <th>Target</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($broadcasts as $b)
                                <tr>
                                    <td>{{ $b->title ?? '—' }}</td>
                                    <td class="text-truncate" style="max-width:200px">{{ Str::limit($b->message, 50) }}</td>
                                    <td><span class="badge bg-secondary">{{ ucfirst($b->channel) }}</span></td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $b->target)) }}</td>
                                    <td>{{ $b->created_at?->format('M j, Y H:i') ?? '—' }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center py-4 text-body">No broadcasts yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($broadcasts->hasPages())
                    <div class="card-footer border-top py-2">
                        {{ $broadcasts->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<p class="small text-muted mt-3">Note: SMS/WhatsApp API integration is required for actual delivery. Currently broadcasts are stored only.</p>
@endsection
