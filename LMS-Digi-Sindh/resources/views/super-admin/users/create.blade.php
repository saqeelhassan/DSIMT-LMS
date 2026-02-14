@extends('layouts.super-admin')

@section('content')
<div class="row">
    <div class="col-12 mb-3">
        <h1 class="h3 mb-2 mb-sm-0">Add User</h1>
        <p class="mb-0 text-body">Create a new user and assign a role (Admin, Instructor, or Student).</p>
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

                <form method="post" action="{{ route('super-admin.users.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First name *</label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name') }}" required>
                            @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last name *</label>
                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name') }}" required>
                            @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile (optional)</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile') }}">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Assign role *</label>
                        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                            <option value="">— Select role —</option>
                            @foreach($roles as $r)
                                <option value="{{ $r->name }}" {{ old('role', request('role')) === $r->name ? 'selected' : '' }}>{{ $r->name }}</option>
                            @endforeach
                        </select>
                        @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3" id="admin-permissions-wrap" style="display: {{ old('role', request('role')) === 'Admin' ? 'block' : 'none' }};">
                        <label class="form-label">Admin access (assign what this admin can do)</label>
                        <p class="small text-body">Only used when role is Admin. Super Admin can change or remove these anytime.</p>
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
                            @foreach($adminPermissions ?? [] as $key => $label)
                                <div class="form-check">
                                    @php $isCoursePerm = in_array($key, ['courses.manage', 'courses.create']); @endphp
                                    <input class="form-check-input perm-cb {{ $isCoursePerm ? 'perm-courses' : '' }}" type="checkbox" name="permissions[]" value="{{ $key }}" id="perm-{{ $key }}" {{ in_array($key, old('permissions', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="perm-{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if(empty($adminPermissions))
                                <p class="mb-0 small text-muted">No permissions defined.</p>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password *</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                            required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-text">At least 8 characters</div>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm password *</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Create User</button>
                        <a href="{{ route('super-admin.users.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
                <script>
                    document.getElementById('role').addEventListener('change', function() {
                        var wrap = document.getElementById('admin-permissions-wrap');
                        wrap.style.display = this.value === 'Admin' ? 'block' : 'none';
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
                    }
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
