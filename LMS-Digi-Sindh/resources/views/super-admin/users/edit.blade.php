@extends('layouts.super-admin')

@section('content')
<div class="row">
    <div class="col-12 mb-3">
        <h1 class="h3 mb-2 mb-sm-0">Edit User</h1>
        <p class="mb-0 text-body">Update details and, for Admins, assign or remove access.</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0 list-unstyled small">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('super-admin.users.update', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="form-label">Profile picture</label>
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <div class="avatar avatar-xxl">
                                @if($user->avatar_url)
                                    <img class="avatar-img rounded-circle border shadow" src="{{ $user->avatar_url }}" alt="Profile">
                                @else
                                    @php $initials = trim(substr($user->userDetail?->first_name ?? '', 0, 1) . substr($user->userDetail?->last_name ?? '', 0, 1)); if (!$initials) { $initials = substr($user->email ?? 'U', 0, 1); } @endphp
                                    <div class="avatar-img rounded-circle border shadow bg-primary text-white d-flex align-items-center justify-content-center text-uppercase fw-bold" style="width:5rem;height:5rem;font-size:1.5rem;">{{ $initials }}</div>
                                @endif
                            </div>
                            <div>
                                <input type="file" name="profile_picture" id="profile_picture" class="form-control form-control-sm @error('profile_picture') is-invalid @enderror" accept="image/jpeg,image/png,image/gif,image/webp">
                                <p class="small text-body mb-0 mt-1">JPG, PNG, GIF or WebP. Max 2 MB. Leave empty to keep current.</p>
                                @error('profile_picture')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First name *</label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name', $user->userDetail?->first_name) }}" required>
                            @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last name *</label>
                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name', $user->userDetail?->last_name) }}" required>
                            @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                        <div class="form-text">Email cannot be changed here.</div>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile (optional)</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile', $user->userDetail?->mobile) }}">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role *</label>
                        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                            @foreach($roles as $r)
                                <option value="{{ $r->name }}" {{ old('role', $user->role?->name) === $r->name ? 'selected' : '' }}>{{ $r->name }}</option>
                            @endforeach
                        </select>
                        @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-4" id="admin-permissions-wrap" style="display: {{ old('role', $user->role?->name) === 'Admin' ? 'block' : 'none' }};">
                        <label class="form-label">Admin access</label>
                        <p class="small text-body">Assign or remove access. Uncheck to revoke; Super Admin can change anytime.</p>
                        <div class="border rounded p-3 bg-light">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="access-courses" aria-describedby="access-courses-help">
                                <label class="form-check-label fw-bold" for="access-courses">Access to courses</label>
                            </div>
                            <div id="access-courses-help" class="form-text small ms-4 mb-2">View, add, and edit courses. Uncheck to revoke course access.</div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="full-access">
                                <label class="form-check-label fw-bold" for="full-access">Give full access (all permissions)</label>
                            </div>
                            <hr class="my-2">
                            @php $userPerms = old('permissions', $user->adminPermissions->pluck('permission')->toArray()); @endphp
                            @foreach($adminPermissions ?? [] as $key => $label)
                                <div class="form-check">
                                    @php $isCoursePerm = in_array($key, ['courses.manage', 'courses.create']); @endphp
                                    <input class="form-check-input perm-cb {{ $isCoursePerm ? 'perm-courses' : '' }}" type="checkbox" name="permissions[]" value="{{ $key }}" id="perm-{{ $key }}" {{ in_array($key, $userPerms) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perm-{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if(empty($adminPermissions))
                                <p class="mb-0 small text-muted">No permissions defined.</p>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update User</button>
                        <a href="{{ route('super-admin.users.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
                <script>
                    document.getElementById('role').addEventListener('change', function() {
                        document.getElementById('admin-permissions-wrap').style.display = this.value === 'Admin' ? 'block' : 'none';
                    });
                    var accessCourses = document.getElementById('access-courses');
                    var permCourses = document.querySelectorAll('.perm-cb.perm-courses');
                    if (accessCourses && permCourses.length) {
                        accessCourses.addEventListener('change', function() {
                            permCourses.forEach(function(cb) { cb.checked = accessCourses.checked; });
                        });
                        permCourses.forEach(function(cb) {
                            cb.addEventListener('change', function() {
                                accessCourses.checked = Array.prototype.every.call(permCourses, function(c) { return c.checked; });
                            });
                        });
                        accessCourses.checked = Array.prototype.every.call(permCourses, function(c) { return c.checked; });
                    }
                    var fullAccess = document.getElementById('full-access');
                    var permCbs = document.querySelectorAll('.perm-cb');
                    if (fullAccess && permCbs.length) {
                        fullAccess.addEventListener('change', function() {
                            permCbs.forEach(function(cb) { cb.checked = fullAccess.checked; });
                        });
                        permCbs.forEach(function(cb) {
                            cb.addEventListener('change', function() {
                                fullAccess.checked = Array.prototype.every.call(permCbs, function(c) { return c.checked; });
                            });
                        });
                        fullAccess.checked = Array.prototype.every.call(permCbs, function(c) { return c.checked; });
                    }
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
