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
                                            <th>Room No.</th>
                                            <th>Category</th>
                                            <th>Floor</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rooms as $room)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $room->room_no }}</td>
                                                <td><span
                                                        class="badge bg-light text-dark">{{ $room->category->name ?? '-' }}</span>
                                                </td>
                                                <td>{{ $room->floor ?? '-' }}</td>
                                                <td>
                                                    @if($room->status == 'available')
                                                        <span class="badge bg-success">Available</span>
                                                    @elseif($room->status == 'maintenance')
                                                        <span class="badge bg-warning">Maintenance</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>

                                                <td class="text-center" style="white-space: nowrap;">
                                                    <div class="d-flex justify-content-center align-items-center gap-1">


                                                        <!-- Edit Button -->
                                                        <button type="button" class="btn btn-sm btn-outline-success"
                                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                                            data-room-id="{{ $room->id }}" data-room-no="{{ $room->room_no }}"
                                                            data-room-floor="{{ $room->floor }}"
                                                            data-room-cat="{{ $room->category_id }}"
                                                            data-room-status="{{ $room->status }}">
                                                            <i class="ri-edit-line"></i>
                                                        </button>

                                                        <!-- Delete Button -->
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            data-room-id="{{ $room->id }}"
                                                            data-room-name="{{ $room->room_no }}">
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
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Room No. <span class="text-danger">*</span></label>
                                <input type="number" placeholder="101" name="room_no" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Floor</label>
                                <input type="number" name="floor" class="form-control" placeholder="1">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Status<span class="text-danger">*</span></label>
                                <select name="status" class="form-select">
                                    <option value="available">Available</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="inactive">Inactive</option>
                                </select>
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
                                <label class="form-label">Room Number</label>
                                <input type="text" name="room_no" id="editRoomNo" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Floor</label>
                                <input type="number" name="floor" id="editFloor" class="form-control">
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

                            <div class="col-md-4">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" id="editStatus" class="form-select">
                                    <option value="available">Available</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="inactive">Inactive</option>
                                </select>
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
            document.getElementById('editRoomNo').value =
                b.getAttribute('data-room-no');

            document.getElementById('editFloor').value =
                b.getAttribute('data-room-floor');

            document.getElementById('editCategory').value =
                b.getAttribute('data-room-cat');

            document.getElementById('editStatus').value =
                b.getAttribute('data-room-status');




        });


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


    </script>
    // SweetAlert notifications
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