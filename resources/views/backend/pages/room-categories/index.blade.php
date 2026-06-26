@extends('backend.layouts.master')
@section('content')
    <div class="lh-main-content">
        <div class="container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>Room Categories</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>Room Categories</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="lh-card">
                        <div class="lh-card-header">
                            <h4 class="lh-card-title">Categories</h4>
                        </div>
                        <div class="lh-card-content">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#createModal">
                                <i class="ri-add-line me-1"></i> Create Category
                            </button>

                            <div class="table-responsive ">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Guests</th>
                                            <th>Rooms</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    @if($category->thumbnail)
                                                        <img src="{{ asset('storage/' . $category->thumbnail) }}"
                                                            alt="{{ $category->name }}" width="60" height="60"
                                                            class="rounded border object-fit-cover">
                                                    @else
                                                        <img src="{{ asset('backend/assets/img/no-image.png') }}" alt="No Image"
                                                            width="60" height="60" class="rounded border">
                                                    @endif
                                                </td>

                                                <td>
                                                    <div>
                                                        <h6 class="mb-1">{{ $category->name }}</h6>

                                                        @if($category->description)
                                                            <small class="text-muted">
                                                                {{ \Illuminate\Support\Str::limit(strip_tags($category->description), 60) }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    @if($category->offer_price)
                                                        <div>
                                                            <span class="fw-bold text-success">
                                                                ₹{{ number_format($category->offer_price, 2) }}
                                                            </span>
                                                            <br>
                                                            <small class="text-decoration-line-through text-muted">
                                                                ₹{{ number_format($category->price, 2) }}
                                                            </small>
                                                        </div>
                                                    @else
                                                        <span class="fw-bold">
                                                            ₹{{ number_format($category->price, 2) }}
                                                        </span>
                                                    @endif
                                                </td>

                                                <td>
                                                    {{ $category->max_guests }}
                                                </td>

                                                <td>
                                                    <span class="badge bg-info">
                                                        {{ $category->rooms()->count() }}
                                                    </span>
                                                </td>

                                                <td>
                                                    <span
                                                        class="badge {{ $category->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ ucfirst($category->status) }}
                                                    </span>
                                                </td>

                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center gap-1">

                                                        <!-- <button type="button"
                                                                                                                                                                                    class="btn btn-sm {{ $category->status == 'active' ? 'btn-outline-warning' : 'btn-outline-success' }}"
                                                                                                                                                                                    onclick="toggleStatus({{ $category->id }}, '{{ $category->status }}')">
                                                                                                                                                                                <i class="ri-toggle-fill"></i>
                                                                                                                                                                            </button> -->

                                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                                            data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                                            data-price="{{ $category->price }}"
                                                            data-offer-price="{{ $category->offer_price }}"
                                                            data-max-guests="{{ $category->max_guests }}"
                                                            data-bedrooms="{{ $category->bedrooms }}"
                                                            data-bathrooms="{{ $category->bathrooms }}"
                                                            data-size="{{ $category->size_sqft }}"
                                                            data-description="{{ $category->description }}"
                                                            data-status="{{ $category->status }}"
                                                            data-amenities='@json($category->amenities)'
                                                            data-thumbnail="{{ asset('storage/' . $category->thumbnail) }}"
                                                            data-images='@json($category->images)'>
                                                            <i class="ri-edit-line"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            data-cat-id="{{ $category->id }}"
                                                            data-cat-name="{{ $category->name }}">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>

                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-4">
                                                    No room categories found.
                                                </td>
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

    <!-- CREATE MODAL -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('room-categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Room Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Category Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" placeholder="Name" name="name" class="form-control" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Price <span class="text-danger">*</span>
                                </label>
                                <input type="number" part="499" step="0.01" name="price" class="form-control" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Offer Price</label>
                                <input type="number" placeholder="299" step="0.01" name="offer_price" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Max Guests <span class="text-danger">*</span>
                                </label>
                                <input type="number" placeholder="2" name="max_guests" class="form-control" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Bedrooms <span class="text-danger">*</span>
                                </label>
                                <input type="number" placeholder="1" name="bedrooms" class="form-control" value="1">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Bathrooms <span class="text-danger">*</span>
                                </label>
                                <input type="number" placeholder="1" name="bathrooms" class="form-control" value="1">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Size (Sq Ft)</label>
                                <input type="number" placeholder="240" name="size_sqft" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4" class="form-control"
                                placeholder="Enter description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gallery Images</label>
                            <input type="file" id="createGallery" name="images[]" multiple class="form-control">
                            <div class="row mt-3" id="createGalleryPreview"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Amenities</label>

                            <div id="amenities-wrapper">
                                <div class="input-group mb-2 amenity-row">
                                    <input type="text" name="amenities[]" class="form-control" placeholder="Enter Amenity">
                                    <button type="button" class="btn btn-danger remove-amenity d-none">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <button type="button" id="add-amenity" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i> Add Amenity
                            </button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Status <span class="text-danger">*</span>
                            </label>

                            <select name="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-primary">
                            Create Category
                        </button>
                    </div>
                </div>


            </form>

        </div>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Room Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Category Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" id="editName" class="form-control" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Price <span class="text-danger">*</span>
                                </label>
                                <input type="number" step="0.01" name="price" id="editPrice" class="form-control" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Offer Price</label>
                                <input type="number" step="0.01" name="offer_price" id="editOfferPrice"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Max Guests <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="max_guests" id="editMaxGuests" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Bedrooms <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="bedrooms" id="editBedrooms" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Bathrooms <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="bathrooms" id="editBathrooms" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Size (Sq Ft)</label>
                                <input type="number" name="size_sqft" id="editSize" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="editDesc" rows="4" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Thumbnail</label>

                            <input type="file" name="thumbnail" id="editThumbnail" class="form-control">

                            <div class="mt-2">
                                <img id="editThumbnailPreview" src="" class="img-fluid rounded border"
                                    style="max-width:150px; display:none;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gallery Images</label>
                            <input type="file" id="editGallery" name="images[]" multiple class="form-control">

                            <div class="row mt-3" id="editGalleryPreview"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amenities</label>

                            <div id="editAmenitiesWrapper"></div>

                            <button type="button" id="addEditAmenity" class="btn btn-sm btn-primary mt-2">
                                <i class="fas fa-plus"></i> Add Amenity
                            </button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Status <span class="text-danger">*</span>
                            </label>

                            <select name="status" id="editStatus" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-success">
                            Update Category
                        </button>
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
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center py-4">
                        <p>Are you sure you want to delete:</p>
                        <h5 class="text-danger fw-bold" id="deleteCatName"></h5>
                        <p class="text-warning small mb-0" id="deleteWarning"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger me-2">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            let dt = new DataTransfer();

            $('#createGallery').on('change', function () {

                for (let file of this.files) {
                    dt.items.add(file);
                }

                this.files = dt.files;

                renderGallery();
            });

            function renderGallery() {

                $('#createGalleryPreview').html('');

                Array.from(dt.files).forEach((file, index) => {

                    $('#createGalleryPreview').append(`
                                                                                                                                    <div class="col-md-3 mb-3 gallery-item">
                                                                                                                                        <div class="position-relative">

                                                                                                                                            <img src="${URL.createObjectURL(file)}"
                                                                                                                                                class="img-fluid rounded border"
                                                                                                                                                style="height:120px;width:100%;object-fit:cover;">

                                                                                                                                            <button
                                                                                                                                                type="button"
                                                                                                                                                class="btn btn-danger btn-sm position-absolute top-0 end-0 removeGallery"
                                                                                                                                                data-index="${index}">
                                                                                                                                                <i class="ri-close-line"></i>
                                                                                                                                            </button>

                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                `);

                });

            }
            $(document).on('click', '.removeGallery', function () {

                let index = $(this).data('index');

                let newDt = new DataTransfer();

                Array.from(dt.files).forEach((file, i) => {

                    if (i != index) {
                        newDt.items.add(file);
                    }

                });

                dt = newDt;

                $('#createGallery')[0].files = dt.files;

                renderGallery();

            });

            $(document).ready(function () {

                $('#add-amenity').click(function () {

                    let html = `
                                                                                                    <div class="input-group mb-2 amenity-row">
                                                                                                    <input type="text" name="amenities[]" class="form-control" placeholder="Enter Amenity">
                                                                                                    <button type="button" class="btn btn-danger remove-amenity">
                                                                                                    <i class="fas fa-times"></i>
                                                                                                    </button>
                                                                                                    </div>
                                                                                                                                        `;

                    $('#amenities-wrapper').append(html);
                });

                $(document).on('click', '.remove-amenity', function () {
                    $(this).closest('.amenity-row').remove();
                });

            });

            // Add new amenity
            $('#addEditAmenity').click(function () {

                $('#editAmenitiesWrapper').append(`
                                                                        <div class="input-group mb-2 amenity-row">
                                                                            <input type="text" name="amenities[]" class="form-control" placeholder="Enter Amenity">

                                                                            <button type="button" class="btn btn-danger removeAmenity">
                                                                                <i class="fas fa-times"></i>
                                                                            </button>
                                                                        </div>
                                                                    `);

            });

            // Remove amenity
            $(document).on('click', '.removeAmenity', function () {
                $(this).closest('.amenity-row').remove();
            });





            document.getElementById('editModal').addEventListener('show.bs.modal', function (e) {
                const button = e.relatedTarget;

                document.getElementById('editForm').action =
                    `{{ url('room-categories') }}/${button.dataset.id}`;

                document.getElementById('editName').value = button.dataset.name;
                document.getElementById('editPrice').value = button.dataset.price;
                document.getElementById('editOfferPrice').value = button.dataset.offerPrice;
                document.getElementById('editMaxGuests').value = button.dataset.maxGuests;
                document.getElementById('editBedrooms').value = button.dataset.bedrooms;
                document.getElementById('editBathrooms').value = button.dataset.bathrooms;
                document.getElementById('editSize').value = button.dataset.size;
                document.getElementById('editDesc').value = button.dataset.description;
                document.getElementById('editStatus').value = button.dataset.status;


                const preview = document.getElementById('editThumbnailPreview');

                if (button.dataset.thumbnail) {
                    preview.src = button.dataset.thumbnail;
                    preview.style.display = 'block';
                } else {
                    preview.style.display = 'none';
                }
                $('#editThumbnail').on('change', function () {

                    const file = this.files[0];

                    if (file) {
                        $('#editThumbnailPreview')
                            .attr('src', URL.createObjectURL(file))
                            .show();
                    }

                });

                $('#editGalleryPreview').html('');

                let images = JSON.parse(button.dataset.images || '[]');

                images.forEach(function (image) {

                    $('#editGalleryPreview').append(`
                                                                                                        <div class="col-md-3 mb-3 existing-image">
                                                                                                            <div class="position-relative">

                                                                                                                <img src="/storage/${image}"
                                                                                                                     class="img-fluid rounded border"
                                                                                                                     style="height:120px;width:100%;object-fit:cover;">

                                                                                                                <button
                            type="button"
                            class="btn btn-danger btn-sm position-absolute top-0 end-0 removeExistingImage"
                            data-image="${image}">
                            <i class="ri-close-line"></i>
                        </button>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    `);

                }); $('#editAmenitiesWrapper').html('');

                let amenities = JSON.parse(button.dataset.amenities || '[]');

                if (amenities.length > 0) {

                    amenities.forEach(function (item) {

                        $('#editAmenitiesWrapper').append(`
                                                            <div class="input-group mb-2 amenity-row">
                                                                <input type="text"
                                                                       name="amenities[]"
                                                                       class="form-control"
                                                                       value="${item}">

                                                                <button type="button" class="btn btn-danger removeAmenity">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </div>
                                                        `);

                    });

                } else {

                    $('#editAmenitiesWrapper').append(`
                                                        <div class="input-group mb-2 amenity-row">
                                                            <input type="text"
                                                                   name="amenities[]"
                                                                   class="form-control"
                                                                   placeholder="Enter Amenity">

                                                            <button type="button" class="btn btn-danger removeAmenity">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    `);

                }


            })

                ;
            let editDt = new DataTransfer();

            $('#editGallery').on('change', function () {

                for (const file of this.files) {
                    editDt.items.add(file);
                }

                this.files = editDt.files;

                renderEditGallery();

            });


            function renderEditGallery() {

                $('.new-image').remove();

                Array.from(editDt.files).forEach((file, index) => {

                    $('#editGalleryPreview').append(`
                                                            <div class="col-md-3 mb-3 new-image">
                                                                <div class="position-relative">

                                                                    <img src="${URL.createObjectURL(file)}"
                                                                         class="img-fluid rounded border"
                                                                         style="height:120px;width:100%;object-fit:cover;">

                                                                    <button
                                                                        type="button"
                                                                        class="btn btn-danger btn-sm position-absolute top-0 end-0 removeNewImage"
                                                                        data-index="${index}">
                                                                        <i class="ri-close-line"></i>
                                                                    </button>

                                                                    <span class="badge bg-primary position-absolute bottom-0 start-0">
                                                                        New
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        `);

                });

            }
            $(document).on('click', '.removeNewImage', function () {

                const index = $(this).data('index');

                let newDt = new DataTransfer();

                Array.from(editDt.files).forEach((file, i) => {

                    if (i !== index) {
                        newDt.items.add(file);
                    }

                });

                editDt = newDt;

                $('#editGallery')[0].files = editDt.files;

                renderEditGallery();

            });
            $(document).on('click', '.removeExistingImage', function () {

                const image = $(this).data('image');

                $('#editForm').append(`
                <input type="hidden"
                       name="deleted_images[]"
                       value="${image}">
            `);

                $(this).closest('.existing-image').remove();

            });

            document.getElementById('deleteModal').addEventListener('show.bs.modal', e => {
                const b = e.relatedTarget;
                document.getElementById('deleteForm').action = `{{ url('room-categories') }}/${b.getAttribute('data-cat-id')}`;
                document.getElementById('deleteCatName').textContent = b.getAttribute('data-cat-name');
            });



            $('#editModal').on('hidden.bs.modal', function () {

                editDt = new DataTransfer();

                $('#editGallery').val('');

                $('#editGalleryPreview').html('');

                $('#editForm input[name="deleted_images[]"]').remove();

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
                Swal.fire({
                    icon: 'error', title: 'Error!', text: '{{ session("error") }}', timer: 3000,
                    showConfirmButton: false
                }); 
            </script>
        @endif
        @if($errors->any())
            <script>
                Swal.fire({
                    icon: 'error', title: 'Error!', html: '<ul class="mb-0"> @foreach($errors->all() as $e)< li >{{ $e }}</li> @endforeach </ul > ', timer: 5000
                });
            </script>
        @endif

    @endpush
@endsection