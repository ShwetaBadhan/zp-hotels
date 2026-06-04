@extends('backend.layouts.master')
@section('content')
    <div class="lh-main-content">
        <div class="container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>Rooms</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>Rooms</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="lh-card">
                        <div class="lh-card-header">
                            <h4 class="lh-card-title">Rooms</h4>
                        </div>
                        <div class="lh-card-content">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#createModal">
                                <i class="ri-add-line me-1"></i> Add Room
                            </button>

                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Room</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Featured</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rooms as $room)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="{{ $room->thumbnail_url }}" alt="{{ $room->name }}"
                                                            class="rounded" style="width:50px;height:40px;object-fit:cover;">
                                                        <div>
                                                            <div class="fw-medium">{{ $room->name }}</div>
                                                            <small class="text-muted">{{ $room->bedrooms }} Bed •
                                                                {{ $room->bathrooms }} Bath • {{ $room->max_guests }}
                                                                Guests</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="badge bg-light text-dark">{{ $room->category->name ?? '-' }}</span>
                                                </td>
                                                <td>
                                                    <div class="fw-bold">${{ number_format($room->price) }}</div>
                                                    @if($room->offer_price)
                                                        <small class="text-danger"><del>${{ number_format($room->price) }}</del>
                                                            ${{ number_format($room->offer_price) }}</small>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge {{ $room->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ ucfirst($room->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($room->featured === 'yes')
                                                        <span class="badge bg-warning text-dark"><i
                                                                class="ri-star-fill me-1"></i>Yes</span>
                                                    @else
                                                        <span class="badge bg-light text-muted">No</span>
                                                    @endif
                                                </td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                                        <button type="button"
                                                            class="btn btn-sm {{ $room->status === 'active' ? 'btn-outline-warning' : 'btn-outline-success' }}"
                                                            onclick="toggleStatus({{ $room->id }}, '{{ $room->status }}')"
                                                            title="Toggle Status">
                                                            <i
                                                                class="ri-toggle-{{ $room->status === 'active' ? 'fill' : 'line' }}"></i>
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-sm {{ $room->featured === 'yes' ? 'btn-outline-warning' : 'btn-outline-secondary' }}"
                                                            onclick="toggleFeatured({{ $room->id }}, '{{ $room->featured }}')"
                                                            title="Toggle Featured">
                                                            <i
                                                                class="ri-star-{{ $room->featured === 'yes' ? 'fill' : 'line' }}"></i>
                                                        </button>
                                                        <!-- Edit Button -->
                                                        <button type="button" class="btn btn-sm btn-outline-success"
                                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                                            data-room-id="{{ $room->id }}" data-room-name="{{ $room->name }}"
                                                            data-room-cat="{{ $room->category_id }}"
                                                            data-room-desc="{{ $room->description }}"
                                                            data-room-price="{{ $room->price }}"
                                                            data-room-offer="{{ $room->offer_price }}"
                                                            data-room-guests="{{ $room->max_guests }}"
                                                            data-room-beds="{{ $room->bedrooms }}"
                                                            data-room-baths="{{ $room->bathrooms }}"
                                                            data-room-size="{{ $room->size_sqft }}"
                                                            data-room-thumb="{{ $room->thumbnail_url }}"
                                                            data-room-amenities="@json($room->amenities ?? [])"
                                                            data-room-status="{{ $room->status }}"
                                                            data-room-featured="{{ $room->featured }}"
                                                            data-room-sort="{{ $room->sort_order }}"
                                                            data-room-images='@json($room->images)'>
                                                            <i class="ri-edit-line"></i>
                                                        </button>

                                                        <!-- Delete Button -->
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            data-room-id="{{ $room->id }}" data-room-name="{{ $room->name }}">
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
            <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Room Name <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Room Name" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="3"
                                    placeholder="Enter room description" required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Price ($)<span class="text-danger">*</span></label>
                                <input type="number" name="price" class="form-control" placeholder="999" step="0.01"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Offer Price ($)<span class="text-danger">*</span></label>
                                <input type="number" name="offer_price" class="form-control" placeholder="799" step="0.01">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Max Guests<span class="text-danger">*</span></label>
                                <input type="number" name="max_guests" class="form-control" placeholder="2" min="1"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Bed <span class="text-danger">*</span></label>
                                <input type="number" name="bedrooms" class="form-control" placeholder="1" min="1" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Bathrooms<span class="text-danger">*</span></label>
                                <input type="number" name="bathrooms" class="form-control" placeholder="1" min="1" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Size (sq ft)<span class="text-danger">*</span></label>
                                <input type="number" name="size_sqft" class="form-control" placeholder="500" min="1"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Thumbnail</label>
                                <input type="file" name="thumbnail" id="thumbnailImage" class="form-control"
                                    accept="image/*">
                                <div id="thumbnailPreview" class="mt-2"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gallery Images</label>

                                <input type="file" name="images[]" id="galleryImages" class="form-control" accept="image/*"
                                    multiple>

                                <div id="galleryPreview" class="row mt-3"></div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Amenities</label>
                                <div class="d-flex flex-wrap gap-2">
                                    @php $amenities = ['WiFi', 'AC', 'TV', 'Mini Bar', 'Room Service', 'Balcony', 'Sea View', 'Parking']; @endphp
                                    @foreach($amenities as $amenity)
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input me-1" type="checkbox" name="amenities[]"
                                                value="{{ $amenity }}">
                                            <span class="form-check-label small">{{ $amenity }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status<span class="text-danger">*</span></label>
                                <select name="status" class="form-select" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Featured<span class="text-danger">*</span></label>
                                <select name="featured" class="form-select" required>
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="0" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Room</button>
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
                        <h5 class="modal-title">Edit Room</h5>
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
                                <label class="form-label">Room Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="editName" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="editCategory" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="editDescription" class="form-control" rows="3"
                                    required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Price ($)<span class="text-danger">*</span></label>
                                <input type="number" name="price" id="editPrice" class="form-control" step="0.01" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Offer Price ($)</label>
                                <input type="number" name="offer_price" id="editOfferPrice" class="form-control"
                                    step="0.01">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Max Guests <span class="text-danger">*</span></label>
                                <input type="number" name="max_guests" id="editMaxGuests" class="form-control" min="1"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Bedrooms <span class="text-danger">*</span></label>
                                <input type="number" name="bedrooms" id="editBedrooms" class="form-control" min="1"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Bathrooms <span class="text-danger">*</span></label>
                                <input type="number" name="bathrooms" id="editBathrooms" class="form-control" min="1"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Size (sq ft) <span class="text-danger">*</span></label>
                                <input type="number" name="size_sqft" id="editSizeSqft" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Current Thumbnail</label>
                                <div id="editThumbnailPreview" class="mb-2">
                                    <!-- Preview will be inserted via JS -->
                                </div>
                                <label class="form-label">Change Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" accept="image/*">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Gallery Images</label>

                                <input type="file" name="images[]" id="editGalleryImages" class="form-control"
                                    accept="image/*" multiple>

                                <div id="editGalleryPreview" class="row mt-3"></div>
                                <input type="hidden" name="existing_images" id="existingImages">
                                
                            </div>
                            <div class="col-12">
                                <label class="form-label">Amenities</label>
                                <div class="d-flex flex-wrap gap-2" id="editAmenitiesContainer">
                                    @php $amenities = ['WiFi', 'AC', 'TV', 'Mini Bar', 'Room Service', 'Balcony', 'Sea View', 'Parking']; @endphp
                                    @foreach($amenities as $amenity)
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input edit-amenity me-1" type="checkbox" name="amenities[]"
                                                value="{{ $amenity }}" id="edit_amenity_{{ $loop->index }}">
                                            <span class="form-check-label small">{{ $amenity }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" id="editStatus" class="form-select" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Featured <span class="text-danger">*</span></label>
                                <select name="featured" id="editFeatured" class="form-select" required>
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" id="editSortOrder" class="form-control" value="0"
                                    min="0">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update Room</button>
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
                        <h5 class="mt-3 mb-2">Delete Room?</h5>
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
        // console.log('Rooms page loaded');

        // SweetAlert notifications
        @if(session('success'))
            Swal.fire({ icon: 'success', title: 'Success!', text: '{{ session("success") }}', timer: 3000, showConfirmButton: false });
        @endif
        @if(session('error'))
            Swal.fire({ icon: 'error', title: 'Error!', text: '{{ session("error") }}', timer: 5000, showConfirmButton: false });
        @endif

            // Toggle Status
            function toggleStatus(id, current) {
                Swal.fire({
                    title: 'Change Status?',
                    text: `Room will be ${current === 'active' ? 'inactive' : 'active'}`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: current === 'active' ? '#ffc107' : '#28a745',
                    confirmButtonText: 'Yes, Change'
                }).then(r => {
                    if (r.isConfirmed) {
                        const f = document.createElement('form');
                        f.method = 'POST';
                        f.action = `{{ url('rooms') }}/${id}/toggle-status`;
                        f.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="PATCH">`;
                        document.body.appendChild(f);
                        f.submit();
                    }
                });
            }

        // Toggle Featured
        function toggleFeatured(id, current) {
            Swal.fire({
                title: 'Toggle Featured?',
                text: `Room will be ${current === 'yes' ? 'removed from' : 'added to'} featured`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: current === 'yes' ? '#ffc107' : '#6c757d',
                confirmButtonText: 'Yes'
            }).then(r => {
                if (r.isConfirmed) {
                    const f = document.createElement('form');
                    f.method = 'POST';
                    f.action = `{{ url('rooms') }}/${id}/toggle-featured`;
                    f.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="PATCH">`;
                    document.body.appendChild(f);
                    f.submit();
                }
            });
        }

        // Edit Modal - Populate fields
        document.getElementById('editModal')?.addEventListener('show.bs.modal', function (e) {
            const b = e.relatedTarget;
            const roomId = b.getAttribute('data-room-id');

            // Set form action
            document.getElementById('editForm').action = `{{ url('rooms') }}/${roomId}`;

            // Populate basic fields
            document.getElementById('editName').value = b.getAttribute('data-room-name') || '';
            document.getElementById('editCategory').value = b.getAttribute('data-room-cat') || '';
            document.getElementById('editDescription').value = b.getAttribute('data-room-desc') || '';
            document.getElementById('editPrice').value = b.getAttribute('data-room-price') || '';
            document.getElementById('editOfferPrice').value = b.getAttribute('data-room-offer') || '';
            document.getElementById('editMaxGuests').value = b.getAttribute('data-room-guests') || '2';
            document.getElementById('editBedrooms').value = b.getAttribute('data-room-beds') || '1';
            document.getElementById('editBathrooms').value = b.getAttribute('data-room-baths') || '1';
            document.getElementById('editSizeSqft').value = b.getAttribute('data-room-size') || '';
            document.getElementById('editStatus').value = b.getAttribute('data-room-status') || 'active';
            document.getElementById('editFeatured').value = b.getAttribute('data-room-featured') || 'no';
            document.getElementById('editSortOrder').value = b.getAttribute('data-room-sort') || '0';

            const thumbUrl = b.getAttribute('data-room-thumb');

            existingGalleryImages = JSON.parse(
                b.getAttribute('data-room-images') || '[]'
            );

            editSelectedFiles = [];
            document.getElementById('editGalleryImages').value = '';

            document.getElementById('existingImages').value =
                JSON.stringify(existingGalleryImages);

            renderEditNewImages();


            const thumbPreview = document.getElementById('editThumbnailPreview');
            if (thumbUrl && thumbUrl !== 'null') {
                thumbPreview.innerHTML = `<img src="${thumbUrl}" alt="Thumbnail" class="rounded" style="max-height:80px;">`;
            } else {
                thumbPreview.innerHTML = `<span class="text-muted small">No thumbnail</span>`;
            }

            // Populate amenities checkboxes
            const assignedAmenities = JSON.parse(b.getAttribute('data-room-amenities') || '[]');
            document.querySelectorAll('.edit-amenity').forEach(cb => {
                cb.checked = assignedAmenities.includes(cb.value);
            });

            console.log('Edit modal populated for room ID:', roomId);
        });

        let editSelectedFiles = [];

        const editInput = document.getElementById('editGalleryImages');

        editInput?.addEventListener('change', function () {

            Array.from(this.files).forEach(file => {
                editSelectedFiles.push(file);
            });

            renderEditNewImages();

            const dt = new DataTransfer();

            editSelectedFiles.forEach(file => {
                dt.items.add(file);
            });

            editInput.files = dt.files;
        });
        let existingGalleryImages = [];

        function renderEditNewImages() {

            const preview = document.getElementById('editGalleryPreview');

            // Existing images first
            preview.innerHTML = '';

            existingGalleryImages.forEach((image, i) => {

                preview.innerHTML += `
                                    <div class="col-md-3 mb-2">
                                        <div class="position-relative">

                                            <img src="/storage/${image}"
                                                 class="img-fluid rounded border"
                                                 style="height:120px;width:100%;object-fit:cover;">

                                            <button type="button"
                                                    class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                    onclick="removeExistingImage(${i})">
                                                ×
                                            </button>

                                        </div>
                                    </div>
                                `;
            });

            // Newly selected images
            editSelectedFiles.forEach((file, index) => {

                const reader = new FileReader();

                reader.onload = function (e) {

                    preview.insertAdjacentHTML('beforeend', `
                                        <div class="col-md-3 mb-2">
                                            <div class="position-relative">

                                                <img src="${e.target.result}"
                                                     class="img-fluid rounded border"
                                                     style="height:120px;width:100%;object-fit:cover;">

                                                <button type="button"
                                                        class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                        onclick="removeNewImage(${index})">
                                                    ×
                                                </button>

                                            </div>
                                        </div>
                                    `);
                };

                reader.readAsDataURL(file);
            });
        }
        function removeNewImage(index) {

            editSelectedFiles.splice(index, 1);

            const dt = new DataTransfer();

            editSelectedFiles.forEach(file => {
                dt.items.add(file);
            });

            editInput.files = dt.files;

            renderEditNewImages();
        }
        function removeExistingImage(index) {

            existingGalleryImages.splice(index, 1);

            document.getElementById('existingImages').value =
                JSON.stringify(existingGalleryImages);

            renderEditNewImages();
        }

        // Delete Modal - Populate room name
        document.getElementById('deleteModal')?.addEventListener('show.bs.modal', function (e) {
            const b = e.relatedTarget;
            const roomId = b.getAttribute('data-room-id');
            const roomName = b.getAttribute('data-room-name');

            document.getElementById('deleteForm').action = `{{ url('rooms') }}/${roomId}`;
            document.getElementById('deleteRoomName').textContent = roomName;
        });

        // Debug: Log form submission
        document.querySelector('form[action*="rooms.store"]')?.addEventListener('submit', function (e) {
            console.log('Create form submitted');
        });
        document.getElementById('editForm')?.addEventListener('submit', function (e) {
            console.log('Edit form submitted');
        });
        document.getElementById('deleteForm')?.addEventListener('submit', function (e) {
            console.log('Delete form submitted');
        });
        //    for add modal gallery images preview and management
        let selectedFiles = [];
        const input = document.getElementById('galleryImages');
        const preview = document.getElementById('galleryPreview');

        input.addEventListener('change', function () {

            // Add new files to existing array
            Array.from(this.files).forEach(file => {
                selectedFiles.push(file);
            });

            renderPreview();

            // Update actual input files
            const dt = new DataTransfer();
            selectedFiles.forEach(file => dt.items.add(file));
            input.files = dt.files;
        });

        function renderPreview() {

            preview.innerHTML = '';

            selectedFiles.forEach((file, index) => {

                const reader = new FileReader();

                reader.onload = function (e) {

                    const div = document.createElement('div');
                    div.className = 'col-md-3 mb-3';

                    div.innerHTML = `
                                                                                                            <div class="position-relative">
                                                                                                                <img src="${e.target.result}"
                                                                                                                     class="img-fluid rounded border"
                                                                                                                     style="height:120px;width:100%;object-fit:cover;">

                                                                                                                <button type="button"
                                                                                                                        class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                                                                                        onclick="removeImage(${index})">
                                                                                                                    ×
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        `;

                    preview.appendChild(div);
                };

                reader.readAsDataURL(file);
            });
        }

        function removeImage(index) {

            selectedFiles.splice(index, 1);

            const dt = new DataTransfer();
            selectedFiles.forEach(file => dt.items.add(file));
            input.files = dt.files;

            renderPreview();
        }

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
@endpush