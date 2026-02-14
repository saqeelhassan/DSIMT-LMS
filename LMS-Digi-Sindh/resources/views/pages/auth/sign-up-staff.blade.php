@extends('layouts.base')

@section('content')
<!-- **************** MAIN CONTENT START **************** -->
<main>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-6">
                    <h2 class="mb-1">Sign up as Staff</h2>
                    <p class="text-body mb-4">Create your staff account. All fields marked * are required.</p>

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
                    @if(session('error'))
                        <div class="alert alert-warning mb-4">{{ session('error') }}</div>
                    @endif

                    <form method="post" action="{{ route('auth.register.staff') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label">Name (First) *</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                            placeholder="First name" value="{{ old('first_name') }}" required>
                                        @error('first_name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Name (Last) *</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                            placeholder="Last name" value="{{ old('last_name') }}" required>
                                        @error('last_name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="father_name" class="form-label">Father Name *</label>
                                        <input type="text" name="father_name" id="father_name" class="form-control form-control-lg @error('father_name') is-invalid @enderror"
                                            placeholder="Father's full name" value="{{ old('father_name') }}" required>
                                        @error('father_name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cnic" class="form-label">CNIC *</label>
                                        <input type="text" name="cnic" id="cnic" class="form-control form-control-lg @error('cnic') is-invalid @enderror"
                                            placeholder="e.g. 42101-1234567-1" value="{{ old('cnic') }}" required>
                                        @error('cnic')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Gender *</label>
                                        <select name="gender" id="gender" class="form-select form-select-lg @error('gender') is-invalid @enderror" required>
                                            <option value="">Select</option>
                                            <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ old('gender') === 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contact_no" class="form-label">Contact No *</label>
                                        <input type="text" name="contact_no" id="contact_no" class="form-control form-control-lg @error('contact_no') is-invalid @enderror"
                                            placeholder="Contact number" value="{{ old('contact_no') }}" required>
                                        @error('contact_no')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="whatsapp" class="form-label">WhatsApp No</label>
                                        <input type="text" name="whatsapp" id="whatsapp" class="form-control form-control-lg @error('whatsapp') is-invalid @enderror"
                                            placeholder="WhatsApp number" value="{{ old('whatsapp') }}">
                                        @error('whatsapp')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="emergency_contact" class="form-label">Emergency Contact</label>
                                        <input type="text" name="emergency_contact" id="emergency_contact" class="form-control form-control-lg @error('emergency_contact') is-invalid @enderror"
                                            placeholder="Emergency contact number" value="{{ old('emergency_contact') }}">
                                        @error('emergency_contact')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="current_address" class="form-label">Current Address *</label>
                                        <textarea name="current_address" id="current_address" rows="2" class="form-control form-control-lg @error('current_address') is-invalid @enderror"
                                            placeholder="Full current address" required>{{ old('current_address') }}</textarea>
                                        @error('current_address')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email *</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                                            <input type="email" name="email" id="email" class="form-control border-0 bg-light rounded-end ps-1 @error('email') is-invalid @enderror"
                                                placeholder="E-mail" value="{{ old('email') }}" required>
                                        </div>
                                        @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="last_qualification" class="form-label">Last Qualification *</label>
                                        <input type="text" name="last_qualification" id="last_qualification" class="form-control form-control-lg @error('last_qualification') is-invalid @enderror"
                                            placeholder="e.g. Matric, Intermediate, Bachelor" value="{{ old('last_qualification') }}" required>
                                        @error('last_qualification')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="domicile_district" class="form-label">Domicile District *</label>
                                        <input type="text" name="domicile_district" id="domicile_district" class="form-control form-control-lg @error('domicile_district') is-invalid @enderror"
                                            placeholder="District of domicile" value="{{ old('domicile_district') }}" required>
                                        @error('domicile_district')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <h6 class="mt-4 mb-2">Documents Upload *</h6>
                                <p class="small text-body mb-3">Upload clear scans/photos. Images: JPG/PNG max 2 MB. PDFs max 5 MB.</p>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="cnic_front" class="form-label">CNIC Front Image *</label>
                                        <input type="file" name="cnic_front" id="cnic_front" class="form-control form-control-lg @error('cnic_front') is-invalid @enderror"
                                            accept="image/jpeg,image/jpg,image/png" required>
                                        @error('cnic_front')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cnic_back" class="form-label">CNIC Back Image *</label>
                                        <input type="file" name="cnic_back" id="cnic_back" class="form-control form-control-lg @error('cnic_back') is-invalid @enderror"
                                            accept="image/jpeg,image/jpg,image/png" required>
                                        @error('cnic_back')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_degree" class="form-label">Last Degree Upload *</label>
                                        <input type="file" name="last_degree" id="last_degree" class="form-control form-control-lg @error('last_degree') is-invalid @enderror"
                                            accept=".pdf,image/jpeg,image/jpg,image/png" required>
                                        @error('last_degree')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="domicile_prc" class="form-label">Domicile / PRC / C *</label>
                                        <input type="file" name="domicile_prc" id="domicile_prc" class="form-control form-control-lg @error('domicile_prc') is-invalid @enderror"
                                            accept=".pdf,image/jpeg,image/jpg,image/png" required>
                                        @error('domicile_prc')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="mb-4 mt-4">
                                    <label for="password" class="form-label">Password *</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
                                        <input type="password" name="password" id="password" class="form-control border-0 bg-light rounded-end ps-1 @error('password') is-invalid @enderror"
                                            placeholder="*********" required>
                                    </div>
                                    @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    <div class="form-text">At least 8 characters</div>
                                </div>
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">Confirm Password *</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border-0 bg-light rounded-end ps-1"
                                            placeholder="*********" required>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary mb-0" type="submit">Sign up as Staff</button>
                                </div>
                    </form>

                    <div class="mt-4 text-center">
                        <span>Already have an account?</span>
                        <a href="{{ route('login') }}" class="fw-bold ms-1">Sign in here</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- **************** MAIN CONTENT END **************** -->
@endsection
