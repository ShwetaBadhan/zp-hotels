@extends('backend.layouts.master')
@section('content')

    <div class="lh-main-content">
        <div class="container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>Nearby Attractions</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>Nearby Attractions</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="lh-card">
                        <div class="lh-card-header">
                            <h4 class="lh-card-title">Nearby Attractions</h4>
                        </div>
                        <div class="lh-card-content">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#add_category">
                                <i class="ri-add-line me-1"></i> Add Nearby Attraction
                            </button>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($attractions as $attraction)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>


                                                <td>{{ $attraction->title }}</td>
                                                <td><span
                                                        class="badge {{ $attraction->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ ucfirst($attraction->status) }}
                                                    </span></td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    <div class="d-flex  align-items-center gap-1">


                                                        <!-- view Button -->
                                                        <button class=" btn btn-sm btn-outline-warning" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_team{{ $attraction->id }}">
                                                            <i class="ri-eye-line"></i></button>

                                                        <!-- Edit Button -->
                                                        <button type="button" class="btn btn-sm btn-outline-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit_team{{ $attraction->id }}">
                                                            <i class="ri-edit-line"></i>
                                                        </button>

                                                        <!-- Delete Button -->
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            data-testimonial-id="{{ $attraction->id }}">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </td>


                                            </tr>

                                        @empty
                                            <tr>
                                                <td></td>
                                                <td>
                                                    No Nearby Attraction found yet.
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Add blog Modal -->
    <div class="modal custom-modal fade" id="add_category" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Add Near By Attraction</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('admin-nearby-attraction.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <label> Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Sub Title <span class="text-danger">*</span></label>
                                <input type="text" name="sub_title" class="form-control" placeholder="Enter Sub Title" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label> Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" required>
                                <small class="text-muted">Recommended size: 360 × 363 (Max 5MB)</small>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" placeholder="Enter Description Here" class="form-control"
                                    rows="3" required></textarea>
                            </div>



                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary me-3">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /Add  Modal -->
    @foreach($attractions as $attraction)
        {{-- view modal --}}
        <div class="modal custom-modal fade" id="view_team{{ $attraction->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">View Nearby Attraction</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-bordered table-striped mb-0">

                            <tr>
                                <th style="width:30%;">Title :</th>
                                <td>{{ $attraction->title }}</td>

                            </tr>
                            <tr>
                                <th style="width:30%;">Sub Title :</th>
                                <td>{{ $attraction->sub_title }}</td>

                            </tr>






                            <tr>
                                <th style="width:30%;">Image :</th>
                                <td>
                                    @if($attraction->image)
                                        <img src="{{ asset('storage/' . $attraction->image) }}" width="120">
                                    @endif
                                </td>
                            </tr>



                            <tr>

                                <th style="width:30%;">Status :</th>
                                <td>
                                    <span class="badge bg-{{ $attraction->status == 'active' ? 'success' : 'danger' }}">
                                        {{ ucfirst($attraction->status) }}
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <th style="width:30%;">Description</th>
                                <td class="description">{{ $attraction->description }}</td>
                            </tr>

                        </table>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="edit_team{{ $attraction->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">Edit Near by Attraction</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ route('admin-nearby-attraction.update', $attraction->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-lg-6 mb-3">
                                    <label>Title *</label>
                                    <input type="text" name="title" class="form-control" value="{{ $attraction->title }}">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label>Sub Title *</label>
                                    <input type="text" name="title" class="form-control" value="{{ $attraction->sub_title }}">
                                </div>



                                <div class="col-lg-6 mb-3">
                                    <label>Status *</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ $attraction->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $attraction->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">

                                    @if($attraction->image)
                                        <img src="{{ asset('storage/' . $attraction->image) }}" width="80" class="mt-2">
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="3"
                                        required>{{ $attraction->description }}</textarea>
                                </div>




                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary">Update </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    @endforeach

    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <form id="deleteForm" method="POST">
                    @csrf @method('DELETE')

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title"><i class="ri-alert-fill me-2"></i>Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center py-4">
                        <i class="ri-delete-bin-line text-danger" style="font-size: 3rem;"></i>
                        <h5 class="mt-3 mb-2">Delete Nearby Attraction?</h5>
                        <p class="text-muted mb-1">Are you sure you want to delete:</p>
                        <h5 class="text-danger fw-bold" id="deleteRoomName"></h5>
                        <p class="text-warning small mb-0"><i class="ri-error-warning-line me-1"></i>This action cannot be
                            undone.</p>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('input[name="title"]').forEach(function (input) {
            input.addEventListener('keyup', function () {
                let slug = this.value.toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');

                this.closest('form').querySelector('input[name="slug"]').value = slug;
            });
        });

        // Delete Modal - Populate room name
        document.getElementById('deleteModal')?.addEventListener('show.bs.modal', function (e) {
            const b = e.relatedTarget;
            const testimonialId = b.getAttribute('data-testimonial-id');

            document.getElementById('deleteForm').action =
                `{{ url('admin-nearby-attraction') }}/${testimonialId}`;

        });
    </script>
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