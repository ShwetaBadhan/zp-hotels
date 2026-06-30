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
                                            <h5 class="mb-0"><i class="fas fa-info-circle"></i> About Us Section</h5>

                                        </div>
                                        <div class="card-body">


                                            <form action="{{ route('admin-event-about.update') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="row">
                                                    <!-- Left Column - Image & Basic Info -->
                                                    <div class="col-lg-6">
                                                        <!-- Main Image -->
                                                        <div class="mb-4">
                                                            <label class="form-label fw-bold">Main Image</label>

                                                            @if($aboutSection->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($aboutSection->image))
                                                                <div class="position-relative mb-3">
                                                                    <img src="{{ asset('storage/' . $aboutSection->image) }}"
                                                                        class="img-fluid rounded shadow-sm"
                                                                        style="max-height: 300px; width: 100%; object-fit: cover;"
                                                                        alt="Main Image"
                                                                        onerror="this.style.display='none'; console.log('Image failed to load: {{ $aboutSection->image }}')">
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
                                                                        @if($aboutSection->image)
                                                                            <p class="text-warning small mt-1 mb-0">
                                                                                <i class="fas fa-exclamation-triangle"></i>
                                                                                Image file not found in storage
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <input type="file" name="image"
                                                                class="form-control @error('image') is-invalid @enderror"
                                                                accept="image/*,.svg">
                                                            <small class="text-muted">Recommended: 525x495px •
                                                                PNG/JPG/SVG (Max 2MB)</small>
                                                            @error('image')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>



                                                    </div>

                                                    <!-- Right Column - Content (Keep existing content) -->

                                                    <div class="col-lg-12 row">
                                                        <!-- Sub Title -->
                                                        <div class="mb-3 col-6">
                                                            <label class="form-label fw-bold">Sub Title <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="sub_title"
                                                                class="form-control @error('sub_title') is-invalid @enderror"
                                                                rows="2"
                                                                required>{{ old('sub_title', $aboutSection->sub_title) }}</textarea>
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
                                                                required>{{ old('main_title', $aboutSection->main_title) }}</textarea>
                                                            @error('main_title')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- Description 1 -->
                                                        <div class="mb-4">
                                                            <label class="form-label fw-bold">Primary Description <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea name="description_1"
                                                                class="form-control @error('description_1') is-invalid @enderror"
                                                                rows="4"
                                                                required>{{ old('description_1', $aboutSection->description_1) }}</textarea>
                                                            @error('description_1')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Description 2 -->
                                                        <div class="mb-4">
                                                            <label class="form-label fw-bold">Secondary
                                                                Description</label>
                                                            <textarea name="description_2"
                                                                class="form-control @error('description_2') is-invalid @enderror"
                                                                rows="3">{{ old('description_2', $aboutSection->description_2) }}</textarea>
                                                            @error('description_2')
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