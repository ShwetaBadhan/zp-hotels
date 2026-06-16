@extends('backend.layouts.master')
@section('content')

    <div class="lh-main-content">
        <div class="container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>Room Facilities</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>Room Facilities</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="lh-card">
                        <div class="lh-card-header">
                            <h4 class="lh-card-title">Room Facilities</h4>
                        </div>
                        <div class="lh-card-content">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#add_category">
                                <i class="ri-add-line me-1"></i> Add Room Facility
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
                                        @forelse ($facilities as $facility)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>


                                                <td>{{ $facility->title }}</td>
                                                <td>{{ $facility->status }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    <div class="d-flex  align-items-center gap-1">


                                                        <!-- view Button -->
                                                        <button class=" btn btn-sm btn-outline-warning" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_team{{ $facility->id }}">
                                                            <i class="ri-eye-line"></i></button>

                                                        <!-- Edit Button -->
                                                        <button type="button" class="btn btn-sm btn-outline-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit_team{{ $facility->id }}">
                                                            <i class="ri-edit-line"></i>
                                                        </button>


                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            data-facility-id="{{ $facility->id }}"
                                                            data-facility-title="{{ $facility->title }}">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                </td>


                                            </tr>

                                        @empty
                                            <tr>
                                                <td></td>
                                                <td>
                                                    No facility found yet.
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

    <!-- Add facility Modal -->
    <div class="modal custom-modal fade" id="add_category" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Add Room Facility</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('admin-room-facility.store') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            <!-- Title -->
                            <div class="col-lg-6 mb-3">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                            </div>

                            <!-- Icon -->
                            <div class="col-lg-6 mb-3">

                                <label>Select Icon</label>

                                <select name="icon" id="iconSelect" class="form-control"></select>

                                <div class="mt-2">
                                    <i id="iconPreview" style="font-size:30px;"></i>
                                </div>

                            </div>

                            <!-- Facility List -->
                            <div class="col-12 mb-3">
                                <label>Facility List <span class="text-danger">*</span></label>

                                <div id="facility-list-wrapper">
                                    <div class="input-group mb-2">
                                        <input type="text" name="list[]" class="form-control" placeholder="Enter Facility">
                                        <button type="button" class="btn btn-success add-facility">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-lg-6 mb-3">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary me-3">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Add Room Facility
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /Add  Modal -->
    @foreach($facilities as $facility)
        {{-- view modal --}}
        <div class="modal custom-modal fade" id="view_team{{ $facility->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">View Facility</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-bordered table-striped mb-0">

                            <tr>
                                <th style="width:30%">Title :</th>
                                <td>{{ $facility->title }}</td>
                            </tr>

                            <tr>
                                <th>Icon :</th>
                                <td>
                                    <i class="{{ $facility->icon }} fs-4"></i>

                                </td>
                            </tr>

                            <tr>
                                <th>Facility List :</th>
                                <td>
                                    <ul class="mb-0">
                                        @foreach($facility->list ?? [] as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>

                            <tr>
                                <th>Status :</th>
                                <td>
                                    <span class="badge bg-{{ $facility->status == 'active' ? 'success' : 'danger' }}">
                                        {{ ucfirst($facility->status) }}
                                    </span>
                                </td>
                            </tr>


                        </table>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="edit_team{{ $facility->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">Edit Facility</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ route('admin-room-facility.update', $facility->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-lg-6 mb-3">
                                    <label>Title *</label>
                                    <input type="text" name="title" class="form-control" value="{{ $facility->title }}">
                                </div>



                                <div class="col-lg-6 mb-3">
                                    <label>Status *</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ $facility->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $facility->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>



                                <div class="col-lg-6 mb-3">
                                    <label>Icon *</label>

                                    <select name="icon" class="form-control edit-icon-select"
                                        data-selected="{{ $facility->icon }}">
                                    </select>

                                    <div class="mt-2">
                                        <i class="{{ $facility->icon }} edit-icon-preview" style="font-size:30px;"></i>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Facility List</label>

                                    <div class="edit-facility-wrapper">
                                        @foreach($facility->list ?? [] as $item)
                                            <div class="input-group mb-2">
                                                <input type="text" name="list[]" class="form-control" value="{{ $item }}">

                                                <button type="button" class="btn btn-danger remove-facility">
                                                    -
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="button" class="btn btn-success add-edit-facility mt-2">
                                        Add More
                                    </button>
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
                        <h5 class="mt-3 mb-2">Delete Facility?</h5>
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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#iconSelect').select2({
                dropdownParent: $('#add_category'),
                width: '100%',
                placeholder: 'Search icon',

                ajax: {
                    url: "{{ url('/admin/icons/search') }}",
                    dataType: 'json',
                    delay: 250,

                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },

                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return {
                                    id: item.class,
                                    text: item.name,
                                    icon: item.class
                                };
                            })
                        };
                    }
                },

                templateResult: function (item) {
                    if (!item.icon) return item.text;

                    return $(`
                                                                                <span>
                                                                                    <i class="${item.icon} me-2"></i>
                                                                                    ${item.text}
                                                                                </span>
                                                                            `);
                },

                templateSelection: function (item) {
                    if (!item.icon) return item.text;

                    return $(`
                                                                                <span>
                                                                                    <i class="${item.icon} me-2"></i>
                                                                                    ${item.text}
                                                                                </span>
                                                                            `);
                }
            });

            $('#iconSelect').on('select2:select', function (e) {

                $('#iconPreview').attr(
                    'class',
                    e.params.data.icon
                );

            });
            $('.edit-icon-select').each(function () {

                let select = $(this);

                select.select2({
                    dropdownParent: select.closest('.modal'),
                    width: '100%',
                    placeholder: 'Search icon',

                    ajax: {
                        url: "{{ url('/admin/icons/search') }}",
                        dataType: 'json',

                        data: function (params) {
                            return {
                                q: params.term
                            };
                        },

                        processResults: function (data) {
                            return {
                                results: data.map(function (item) {
                                    return {
                                        id: item.class,
                                        text: item.name,
                                        icon: item.class
                                    };
                                })
                            };
                        }
                    },

                    templateResult: function (item) {
                        if (!item.icon) return item.text;

                        return $(`
                                    <span>
                                        <i class="${item.icon} me-2"></i>
                                        ${item.text}
                                    </span>
                                `);
                    },

                    templateSelection: function (item) {
                        if (!item.icon) return item.text;

                        return $(`
                                    <span>
                                        <i class="${item.icon} me-2"></i>
                                        ${item.text}
                                    </span>
                                `);
                    }
                });

            });
        });
        
        $(document).ready(function () {

            $(document).on('click', '.add-facility', function () {

                $('#facility-list-wrapper').append(`
                                                                                                                            <div class="input-group mb-2">
                                                                                                                                <input type="text" name="list[]" class="form-control"
                                                                                                                                    placeholder="Enter Facility">
                                                                                                                                <button type="button" class="btn btn-danger remove-facility">
                                                                                                                                    -
                                                                                                                                </button>
                                                                                                                            </div>
                                                                                                                        `);

            });

            $(document).on('click', '.remove-facility', function () {
                $(this).closest('.input-group').remove();
            });
            $(document).on('click', '.add-edit-facility', function () {

                $(this).siblings('.edit-facility-wrapper').append(`
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="list[]" class="form-control">

                                                            <button type="button"
                                                                class="btn btn-danger remove-facility">
                                                                -
                                                            </button>
                                                        </div>
                                                    `);

            });

        });
        $('#deleteModal').on('show.bs.modal', function (event) {

    let button = $(event.relatedTarget);

    let facilityId = button.data('facility-id');
    let facilityTitle = button.data('facility-title');

    $('#deleteRoomName').text(facilityTitle);

    $('#deleteForm').attr(
        'action',
        '/admin-room-facility/' + facilityId
    );

    console.log($('#deleteForm').attr('action'));
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