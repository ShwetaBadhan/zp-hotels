@extends('backend.layouts.master')
@section('content')

    <div class="lh-main-content">
        <div class="container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>Gallery Images</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>Gallery Images</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="lh-card">
                        <div class="lh-card-header">
                            <h4 class="lh-card-title">Gallery Images</h4>
                        </div>
                        <div class="lh-card-content">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#createModal">
                                <i class="ri-add-line me-1"></i> Add Image
                            </button>

                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($images as $image)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->name }}"
                                                            class="rounded" style="width:50px;height:40px;object-fit:cover;">
                                                        <div>
                                                            <div class="fw-medium">{{ $image->name }}</div>
                                                            <small
                                                                class="text-muted">{{ $image->category ?? '-' }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="badge bg-light text-dark">{{ $image->category ?? '-' }}</span>
                                                </td>

                                                <td>
                                                    <span
                                                        class="badge {{ $image->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ ucfirst($image->status) }}
                                                    </span>
                                                </td>

                                                <td class="text-center" style="white-space: nowrap;">
                                                    <div class="d-flex justify-content-center align-items-center gap-1">


                                                        <!-- Edit Button -->
                                                        <button type="button" class="btn btn-sm btn-outline-success"
                                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                                            data-image-id="{{ $image->id }}"
                                                            data-image-cat="{{ $image->category ?? '-' }}"
                                                            data-image-thumb="{{ $image->image }}"
                                                            data-image-status="{{ $image->status }}">
                                                            <i class="ri-edit-line"></i>
                                                        </button>

                                                        <!-- Delete Button -->
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            data-image-id="{{ $image->id }}"
                                                            data-image-name="{{ $image->name }}">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CREATE MODAL (Simplified) -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <form action="{{ route('admin-gallery-images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <select name="category" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" id="thumbnailImage" class="form-control" accept="image/*">
                                <div id="thumbnailPreview" class="mt-2"></div>
                            </div>


                            <div class="col-md-4">
                                <label class="form-label">Status<span class="text-danger">*</span></label>
                                <select name="status" class="form-select" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Image</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- EDIT MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Validation Errors -->
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                <ul class="mb-0 small">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <select name="category" id="editCategory" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label class="form-label">Current Thumbnail</label>
                                <div id="editThumbnailPreview" class="mb-2">
                                    <!-- Preview will be inserted via JS -->
                                </div>
                                <label class="form-label">Change Thumbnail</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>


                            <div class="col-md-4">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" id="editStatus" class="form-select" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
                        <h5 class="mt-3 mb-2">Delete image?</h5>
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



        // Edit Modal - Populate fields
        document.getElementById('editModal')?.addEventListener('show.bs.modal', function (e) {
            const b = e.relatedTarget;
            const imageId = b.getAttribute('data-image-id');

            document.getElementById('editForm').action =
                `{{ url('admin-gallery-images') }}/${imageId}`;
            // Populate basic fields
            document.getElementById('editCategory').value = b.getAttribute('data-image-cat') || '';
            document.getElementById('editStatus').value = b.getAttribute('data-image-status') || 'active';

            const thumbUrl = b.getAttribute('data-image-thumb');
            const imageFinalUrl = thumbUrl ? `{{ asset('storage/') }}/${thumbUrl}` : null;




            const thumbPreview = document.getElementById('editThumbnailPreview');
            if (thumbUrl && thumbUrl !== 'null') {
                thumbPreview.innerHTML = `<img src="${imageFinalUrl}" alt="Thumbnail" class="rounded" style="max-height:80px;">`;
            } else {
                thumbPreview.innerHTML = `<span class="text-muted small">No thumbnail</span>`;
            }



            console.log('Edit modal populated for image ID:', imageId);
        });

       

        // Delete Modal - Populate room name
        document.getElementById('deleteModal')?.addEventListener('show.bs.modal', function (e) {
            const b = e.relatedTarget;
            const imageId = b.getAttribute('data-image-id');
            const imageName = b.getAttribute('data-image-name');

            document.getElementById('deleteForm').action =
                `{{ url('admin-gallery-images') }}/${imageId}`;

            document.getElementById('deleteRoomName').textContent = imageName;
        });

        // Debug: Log form submission
        document.querySelector('form[action*="admin-gallery-images.store"]')?.addEventListener('submit', function (e) {
            console.log('Create form submitted');
        });
        document.getElementById('editForm')?.addEventListener('submit', function (e) {
            console.log('Edit form submitted');
        });
        document.getElementById('deleteForm')?.addEventListener('submit', function (e) {
            console.log('Delete form submitted');
        });



        document.getElementById('thumbnailImage').addEventListener('change', function () {

            const preview = document.getElementById('thumbnailPreview');
            preview.innerHTML = '';

            Array.from(this.files).forEach(file => {

                const reader = new FileReader();

                reader.onload = function (e) {

                    const col = document.createElement('div');
                    col.className = 'col-md-6 mb-2';

                    col.innerHTML = `
                                                                                                                                                    <img src="${e.target.result}"
                                                                                                                                                         class="img-fluid rounded border"
                                                                                                                                                         style="height:120px;width:100%;object-fit:cover;">
                                                                                                                                                `;

                    preview.appendChild(col);
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success', title: 'Success!', text: '{{ session("success") }}', timer: 3000, showConfirmButton: false
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            Swal.fire({ icon: 'error', title: 'Error!', text: '{{ session("error") }}', timer: 5000, showConfirmButton: false });
        </script>
    @endif

@endpush