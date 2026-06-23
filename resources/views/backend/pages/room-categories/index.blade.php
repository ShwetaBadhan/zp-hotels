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
                         alt="{{ $category->name }}"
                         width="60"
                         height="60"
                         class="rounded border object-fit-cover">
                @else
                    <img src="{{ asset('backend/assets/img/no-image.png') }}"
                         alt="No Image"
                         width="60"
                         height="60"
                         class="rounded border">
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
                <span class="badge {{ $category->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                    {{ ucfirst($category->status) }}
                </span>
            </td>

            <td class="text-center">
                <div class="d-flex justify-content-center gap-1">

                    <button type="button"
                            class="btn btn-sm {{ $category->status == 'active' ? 'btn-outline-warning' : 'btn-outline-success' }}"
                            onclick="toggleStatus({{ $category->id }}, '{{ $category->status }}')">
                        <i class="ri-toggle-fill"></i>
                    </button>

                    <button type="button"
                            class="btn btn-sm btn-outline-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal"

                           data-id="{{ $category->id }}"
data-name="{{ $category->name }}"
data-price="{{ $category->price }}"
data-offer-price="{{ $category->offer_price }}"
data-max-guests="{{ $category->max_guests }}"
data-bedrooms="{{ $category->bedrooms }}"
data-bathrooms="{{ $category->bathrooms }}"
data-size="{{ $category->size_sqft }}"
data-description="{{ $category->description }}"
data-status="{{ $category->status }}"
                            data-status="{{ $category->status }}">
                        <i class="ri-edit-line"></i>
                    </button>

                    <button type="button"
                            class="btn btn-sm btn-outline-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
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
           <form action="{{ route('room-categories.store') }}"
      method="POST"
      enctype="multipart/form-data">
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
                <input type="text"
                       name="name"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">
                    Price <span class="text-danger">*</span>
                </label>
                <input type="number"
                       step="0.01"
                       name="price"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Offer Price</label>
                <input type="number"
                       step="0.01"
                       name="offer_price"
                       class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <label class="form-label">
                    Max Guests <span class="text-danger">*</span>
                </label>
                <input type="number"
                       name="max_guests"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">
                    Bedrooms <span class="text-danger">*</span>
                </label>
                <input type="number"
                       name="bedrooms"
                       class="form-control"
                       value="1">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">
                    Bathrooms <span class="text-danger">*</span>
                </label>
                <input type="number"
                       name="bathrooms"
                       class="form-control"
                       value="1">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Size (Sq Ft)</label>
                <input type="number"
                       name="size_sqft"
                       class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description"
                      rows="4"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input type="file"
                   name="thumbnail"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Gallery Images</label>
            <input type="file"
                   name="images[]"
                   multiple
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Amenities</label>

            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text"
                           name="amenities[]"
                           class="form-control"
                           placeholder="WiFi">
                </div>

                <div class="col-md-4">
                    <input type="text"
                           name="amenities[]"
                           class="form-control"
                           placeholder="Smart TV">
                </div>

                <div class="col-md-4">
                    <input type="text"
                           name="amenities[]"
                           class="form-control"
                           placeholder="Air Conditioner">
                </div>
            </div>
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
        <button type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal">
            Cancel
        </button>

        <button type="submit"
                class="btn btn-primary">
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
                <input type="text"
                       name="name"
                       id="editName"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">
                    Price <span class="text-danger">*</span>
                </label>
                <input type="number"
                       step="0.01"
                       name="price"
                       id="editPrice"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Offer Price</label>
                <input type="number"
                       step="0.01"
                       name="offer_price"
                       id="editOfferPrice"
                       class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <label class="form-label">
                    Max Guests <span class="text-danger">*</span>
                </label>
                <input type="number"
                       name="max_guests"
                       id="editMaxGuests"
                       class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">
                    Bedrooms <span class="text-danger">*</span>
                </label>
                <input type="number"
                       name="bedrooms"
                       id="editBedrooms"
                       class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">
                    Bathrooms <span class="text-danger">*</span>
                </label>
                <input type="number"
                       name="bathrooms"
                       id="editBathrooms"
                       class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Size (Sq Ft)</label>
                <input type="number"
                       name="size_sqft"
                       id="editSize"
                       class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description"
                      id="editDesc"
                      rows="4"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input type="file"
                   name="thumbnail"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Gallery Images</label>
            <input type="file"
                   name="images[]"
                   multiple
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">
                Status <span class="text-danger">*</span>
            </label>

            <select name="status"
                    id="editStatus"
                    class="form-select">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

    </div>

    <div class="modal-footer">
        <button type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal">
            Cancel
        </button>

        <button type="submit"
                class="btn btn-success">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
                                @if(session('success'))
                                   Swal.fire({ icon: 'success', title: 'Success!', text: '{{ session("success") }}', timer: 3000, showConfirmButton: false });
                                @endif
            @if(session('error')) Swal.fire({ icon: 'error', title: 'Error!', text: '{{ session("error") }}', timer: 3000, showConfirmButton: false }); @endif
            @if($errors->any()) Swal.fire({ icon: 'error', title: 'Error!', html: '<ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>', timer: 5000 }); @endif

            function toggleStatus(id, current) {
                Swal.fire({ title: 'Change Status?', text: `Category will be ${current === 'active' ? 'inactive' : 'active'}`, icon: 'question', showCancelButton: true, confirmButtonText: 'Yes' }).then(r => {
                    if (r.isConfirmed) { const f = document.createElement('form'); f.method = 'POST'; f.action = `{{ url('room-categories') }}/${id}/toggle-status`; f.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="PATCH">`; document.body.appendChild(f); f.submit(); }
                });
            }

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
});

            document.getElementById('deleteModal').addEventListener('show.bs.modal', e => {
                const b = e.relatedTarget;
                document.getElementById('deleteForm').action = `{{ url('room-categories') }}/${b.getAttribute('data-cat-id')}`;
                document.getElementById('deleteCatName').textContent = b.getAttribute('data-cat-name');
            });
        </script>
    @endpush
@endsection