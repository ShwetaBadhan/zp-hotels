@extends("backend.layouts.master")
@section("content")
<div class="lh-main-content">
    <div class="container-fluid">
        <div class="lh-page-title">
            <div class="lh-breadcrumb">
                <h5>General Settings</h5>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li>General Settings</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="lh-card-content">

                    <div class=" content container-fluid">


                        @if(session('success'))
                        <script>
                            Swal.fire('Success!', '{{ session("success") }}', 'success');
                        </script>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="row g-5">
                            <div class="col-lg-12">
                                <div class="card border shadow-sm h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0"><i class="fas fa-info-circle"></i> General Settings</h5>

                                    </div>
                                    <div class="card-body">


                                        <form action="{{ route('admin-general-settings.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <!-- Left Column -->
                                                <div class="col-lg-4">

                                                    <!-- Logo -->
                                                    <div class="mb-4">
                                                        <label class="form-label fw-bold">Logo</label>

                                                        @if($generalSetting->logo)
                                                        <div class="mb-3">
                                                            <img src="{{ asset('storage/' . $generalSetting->logo) }}"
                                                                class="img-fluid rounded border"
                                                                style="max-height:180px;">
                                                        </div>
                                                        @endif

                                                        <input type="file" name="logo"
                                                            class="form-control @error('logo') is-invalid @enderror">

                                                        @error('logo')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Dark Logo -->
                                                    <div class="mb-4">
                                                        <label class="form-label fw-bold">Dark Logo</label>

                                                        @if($generalSetting->dark_logo)
                                                        <div class="mb-3">
                                                            <img src="{{ asset('storage/' . $generalSetting->dark_logo) }}"
                                                                class="img-fluid rounded border bg-dark p-2"
                                                                style="max-height:180px;">
                                                        </div>
                                                        @endif

                                                        <input type="file" name="dark_logo"
                                                            class="form-control @error('dark_logo') is-invalid @enderror">

                                                        @error('dark_logo')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Status -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold d-block">Status</label>

                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="is_active" value="1" {{ old('is_active', $generalSetting->is_active) ? 'checked' : '' }}>

                                                            <label class="form-check-label">
                                                                Active
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Right Column -->
                                                <div class="col-lg-8">

                                                    <div class="row">

                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">
                                                                Brand Name <span class="text-danger">*</span>
                                                            </label>

                                                            <input type="text" name="brand_name"
                                                                class="form-control @error('brand_name') is-invalid @enderror"
                                                                value="{{ old('brand_name', $generalSetting->brand_name) }}">

                                                            @error('brand_name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">
                                                                Phone <span class="text-danger">*</span>
                                                            </label>

                                                            <input type="text" name="phone"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                value="{{ old('phone', $generalSetting->phone) }}">

                                                            @error('phone')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">
                                                                Email <span class="text-danger">*</span>
                                                            </label>

                                                            <input type="email" name="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                value="{{ old('email', $generalSetting->email) }}">

                                                            @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">
                                                                Address <span class="text-danger">*</span>
                                                            </label>

                                                            <input type="text" name="address"
                                                                class="form-control @error('address') is-invalid @enderror"
                                                                value="{{ old('address', $generalSetting->address) }}">

                                                            @error('address')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12 mb-3">
                                                            <label class="form-label fw-bold">
                                                                Introduction
                                                            </label>

                                                            <textarea name="intro" rows="6"
                                                                class="form-control @error('intro') is-invalid @enderror">{{ old('intro', $generalSetting->intro) }}</textarea>

                                                            @error('intro')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="text-end mt-4">
                                                <button class="btn btn-primary px-5" type="submit">
                                                    <i class="fas fa-save me-2"></i>
                                                    Update Settings
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="lh-card-content">

                    <div class=" content container-fluid">


                        @if(session('success'))
                        <script>
                            Swal.fire('Success!', '{{ session("success") }}', 'success');
                        </script>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="row g-5">
                            <div class="col-lg-12">
                                <div class="card border shadow-sm h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0"><i class="fas fa-info-circle"></i> Social Settings</h5>

                                    </div>
                                    <div class="card-body">


                                        <form action="{{ route('admin-social-settings.update') }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">

                                                <div class="col-lg-6">

                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">
                                                            <i class="ri-facebook-fill text-primary me-1"></i>
                                                            Facebook URL
                                                        </label>
                                                        <input type="url"
                                                            name="facebook_url"
                                                            class="form-control @error('facebook_url') is-invalid @enderror"
                                                            placeholder="https://facebook.com/username"
                                                            value="{{ old('facebook_url', $socialSetting->facebook_url) }}">

                                                        @error('facebook_url')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">
                                                            <i class="ri-instagram-line text-danger me-1"></i>
                                                            Instagram URL
                                                        </label>
                                                        <input type="url"
                                                            name="instagram_url"
                                                            class="form-control @error('instagram_url') is-invalid @enderror"
                                                            placeholder="https://instagram.com/username"
                                                            value="{{ old('instagram_url', $socialSetting->instagram_url) }}">

                                                        @error('instagram_url')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="col-lg-6">

                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">
                                                            <i class="ri-twitter-x-line me-1"></i>
                                                            Twitter / X URL
                                                        </label>
                                                        <input type="url"
                                                            name="twitter_url"
                                                            class="form-control @error('twitter_url') is-invalid @enderror"
                                                            placeholder="https://x.com/username"
                                                            value="{{ old('twitter_url', $socialSetting->twitter_url) }}">

                                                        @error('twitter_url')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">
                                                            <i class="ri-linkedin-box-fill text-primary me-1"></i>
                                                            LinkedIn URL
                                                        </label>
                                                        <input type="url"
                                                            name="linkedin_url"
                                                            class="form-control @error('linkedin_url') is-invalid @enderror"
                                                            placeholder="https://linkedin.com/in/username"
                                                            value="{{ old('linkedin_url', $socialSetting->linkedin_url) }}">

                                                        @error('linkedin_url')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold d-block">Status</label>

                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                type="checkbox"
                                                                name="is_active"
                                                                value="1"
                                                                {{ old('is_active', $socialSetting->is_active) ? 'checked' : '' }}>

                                                            <label class="form-check-label">
                                                                Active
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="text-end mt-4">
                                                <button type="submit" class="btn btn-primary px-5">
                                                    <i class="fas fa-save me-2"></i>
                                                    Update Social Links
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
@push('scripts')
@if(session('success'))

<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session("success") }}',
        showConfirmButton: false,
        timer: 2000
    })
</script>

@endif
@if($errors->any())

<script>
    Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        text: '{{ $errors->first() }}'
    })
</script>

@endif
@endpush