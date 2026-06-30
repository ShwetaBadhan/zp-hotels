@extends("backend.layouts.master")
@section("content")
    <div class="lh-main-content">
        <div class="container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>About Us Page</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>About Us Page</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="lh-card-content">

                        <div class=" content container-fluid">


                            @if(session('success'))
                                <script>Swal.fire('Success!', '{{ session("success") }}', 'success');</script>
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
                                            <h5 class="mb-0"><i class="fas fa-info-circle"></i> Mission Vision Section</h5>

                                        </div>
                                        <div class="card-body">


                                            <form action="{{ route('mission-vision.update') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="row">
                                                    <!-- Left Column - Image & Basic Info -->
                                                    <div class="col-lg-6">
                                                        <!-- Main Image -->
                                                        <div class="mb-4">
                                                            <label class="form-label fw-bold">Mission Image</label>

                                                            @if($missionVisionSection->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($missionVisionSection->mission_image))
                                                                <div class="position-relative mb-3">
                                                                    <img src="{{ asset('storage/' . $missionVisionSection->mission_image) }}"
                                                                        class="img-fluid rounded shadow-sm"
                                                                        style="max-height: 300px; width: 100%; object-fit: cover;"
                                                                        alt="Main Image"
                                                                        onerror="this.style.display='none'; console.log('Image failed to load: {{ $missionVisionSection->missionimage }}')">
                                                                    <small class="text-success d-block mt-1">
                                                                        <i class="fas fa-check-circle"></i> Image loaded
                                                                        successfully
                                                                    </small>
                                                                </div>
                                                            @else
                                                                <div class="bg-light border-dashed rounded d-flex align-items-center justify-content-center mb-3"
                                                                    style="height: 250px; border-style: dashed;">
                                                                    <div class="text-center">
                                                                        <i class="fas fa-image text-muted"
                                                                            style="font-size: 60px;"></i>
                                                                        <p class="text-muted mt-2 mb-0">No image uploaded
                                                                        </p>
                                                                        @if($missionVisionSection->mission_image)
                                                                            <p class="text-warning small mt-1 mb-0">
                                                                                <i class="fas fa-exclamation-triangle"></i>
                                                                                Image file not found in storage
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <input type="file" name="mission_image"
                                                                class="form-control @error('mission_image') is-invalid @enderror"
                                                                accept="image/*,.svg">
                                                            <small class="text-muted">Recommended: 525x495px •
                                                                PNG/JPG/SVG (Max 2MB)</small>
                                                            @error('image')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>



                                                    </div>

                                                    <!-- Right Column - Content (Keep existing content) -->
                                                    <div class="col-lg-6">
                                                        <!-- side Image -->
                                                        <div class="mb-4">
                                                            <label class="form-label fw-bold">Side Image</label>

                                                            @if($missionVisionSection->vision_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($missionVisionSection->vision_image))
                                                                <div class="position-relative mb-3">
                                                                    <img src="{{ asset('storage/' . $missionVisionSection->vision_image) }}"
                                                                        class="img-fluid rounded shadow-sm"
                                                                        style="max-height: 300px; width: 100%; object-fit: cover;"
                                                                        alt="Side Image"
                                                                        onerror="this.style.display='none'; console.log('Image failed to load: {{ $missionVisionSection->vision_image }}')">
                                                                    <small class="text-success d-block mt-1">
                                                                        <i class="fas fa-check-circle"></i>Size Image loaded
                                                                        successfully
                                                                    </small>
                                                                </div>
                                                            @else
                                                                <div class="bg-light border-dashed rounded d-flex align-items-center justify-content-center mb-3"
                                                                    style="height: 250px; border-style: dashed;">
                                                                    <div class="text-center">
                                                                        <i class="fas fa-image text-muted"
                                                                            style="font-size: 60px;"></i>
                                                                        <p class="text-muted mt-2 mb-0">No image uploaded</p>
                                                                        @if($missionVisionSection->vision_image)
                                                                            <p class="text-warning small mt-1 mb-0">
                                                                                <i class="fas fa-exclamation-triangle"></i>
                                                                                Image file not found in storage
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <input type="file" name="vision_image"
                                                                class="form-control @error('vision_image') is-invalid @enderror"
                                                                accept="image/*,.svg">
                                                            <small class="text-muted">Recommended: 300x290px • PNG/JPG/SVG
                                                                (Max 2MB)</small>
                                                            @error('side_image')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>



                                                    </div>
                                                    <div class="col-lg-12 row">
                                                        <!-- Sub Title -->
                                                        <div class="mb-3 col-6">
                                                            <label class="form-label fw-bold">Sub Title <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="sub_title"
                                                                class="form-control @error('sub_title') is-invalid @enderror"
                                                                rows="2"
                                                                required>{{ old('sub_title', $missionVisionSection->sub_title) }}</textarea>
                                                            @error('sub_title')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- Main Title -->
                                                        <div class="mb-3 col-6">
                                                            <label class="form-label fw-bold">Main Title <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="main_title"
                                                                class="form-control @error('main_title') is-invalid @enderror"
                                                                rows="2"
                                                                required>{{ old('main_title', $missionVisionSection->main_title) }}</textarea>
                                                            @error('main_title')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- mission main title -->
                                                        <div class="mb-3 col-6">
                                                            <label class="form-label fw-bold">Mission Main Title <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="mission_main_title"
                                                                class="form-control @error('mission_main_title') is-invalid @enderror"
                                                                rows="2"
                                                                required>{{ old('mission_main_title', $missionVisionSection->mission_main_title) }}</textarea>
                                                            @error('mission_main_title')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- mission sub title -->
                                                        <div class="mb-3 col-6">
                                                            <label class="form-label fw-bold">Mission Sub Title <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="mission_sub_title"
                                                                class="form-control @error('mission_sub_title') is-invalid @enderror"
                                                                rows="2"
                                                                required>{{ old('mission_sub_title', $missionVisionSection->mission_main_title) }}</textarea>
                                                            @error('mision_sub_title')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- vision main title -->
                                                        <div class="mb-3 col-6">
                                                            <label class="form-label fw-bold">Vision Main Title <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="vision_main_title"
                                                                class="form-control @error('vision_main_title') is-invalid @enderror"
                                                                rows="2"
                                                                required>{{ old('vision_main_title', $missionVisionSection->vision_main_title) }}</textarea>
                                                            @error('vision_main_title')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- vision main title -->
                                                        <div class="mb-3 col-6">
                                                            <label class="form-label fw-bold">Vision Sub Title <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="vision_sub_title"
                                                                class="form-control @error('vision_sub_title') is-invalid @enderror"
                                                                rows="2"
                                                                required>{{ old('vision_sub_title', $missionVisionSection->vision_sub_title) }}</textarea>
                                                            @error('vision_sub_title')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- Description 1 -->
                                                        <div class="mb-4">
                                                            <label class="form-label fw-bold">Mission <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="mission"
                                                                class="form-control @error('mission') is-invalid @enderror"
                                                                rows="4"
                                                                required>{{ old('mission', $missionVisionSection->mission) }}</textarea>
                                                            @error('mission')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Description 2 -->
                                                        <div class="mb-4">
                                                            <label class="form-label fw-bold">Vision</label>
                                                            <textarea name="vision"
                                                                class="form-control @error('vision') is-invalid @enderror"
                                                                rows="3">{{ old('vision', $missionVisionSection->vision) }}</textarea>
                                                            @error('vision')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                @can('edit')
                                                    <div class="text-end mt-4">

                                                        <button type="submit" class="btn btn-primary btn-lg px-5">
                                                            <i class="fas fa-save me-2"></i>Update
                                                        </button>

                                                    </div>
                                                @endcan
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