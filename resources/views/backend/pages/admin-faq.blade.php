@extends('backend.layouts.master')
@section('content')

    <div class="lh-main-content">
        <div class="container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>FAQ</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>FAQ</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="lh-card">
                        <div class="lh-card-header">
                            <h4 class="lh-card-title">FAQ</h4>
                        </div>
                        <div class="lh-card-content">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#add_category">
                                <i class="ri-add-line me-1"></i> Add FAQ
                            </button>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>FAQ Question</th>
                                            <th>Status</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($faqs as $faq)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>


                                                <td>{{ $faq->question }}</td>
                                                <td>{{ $faq->status }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    <div class="d-flex  align-items-center gap-1">


                                                        <!-- view Button -->
                                                        <button class=" btn btn-sm btn-outline-warning" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#view_team{{ $faq->id }}">
                                                            <i class="ri-eye-line"></i></button>

                                                        @can('edit')
                                                            <!-- Edit Button -->
                                                            <button type="button" class="btn btn-sm btn-outline-success"
                                                                data-bs-toggle="modal" data-bs-target="#edit_team{{ $faq->id }}">
                                                                <i class="ri-edit-line"></i>
                                                            </button>
                                                        @endcan
                                                        @can('delete')
                                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                                data-facility-id="{{ $faq->id }}"
                                                                data-facility-title="{{ $faq->question }}">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        @endcan
                                                    </div>
                                                </td>


                                            </tr>

                                        @empty
                                            <tr>
                                                <td></td>
                                                <td>
                                                    No FAQ found yet.
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
                        <h4 class="mb-0">Add FAQ's</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('admin-faq.store') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            <!-- question -->
                            <div class="col-lg-12 mb-3">
                                <label>FAQ Question <span class="text-danger">*</span></label>
                                <input type="text" name="question" class="form-control" placeholder="Enter Question"
                                    required>
                            </div>
                            <!-- answer -->
                            <div class="col-lg-12 mb-3">
                                <label>FAQ Answer <span class="text-danger">*</span></label>
                                <!-- <input type="text" name="answer" class="form-control" placeholder="Enter Answer" required> -->
                                <textarea type="text" name="answer" class="form-control" placeholder="Enter Answer"
                                    required></textarea>
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
                            Add FAQ
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /Add  Modal -->
    @foreach($faqs as $faq)
        {{-- view modal --}}
        <div class="modal custom-modal fade" id="view_team{{ $faq->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">View FAQ</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-bordered table-striped mb-0">

                            <tr>
                                <th style="width:30%">Question :</th>
                                <td>{{ $faq->question }}</td>
                            </tr>

                            <tr>
                                <th>Asnwer :</th>
                                <td>
                                    {{ $faq->answer }}

                                </td>
                            </tr>



                            <tr>
                                <th>Status :</th>
                                <td>
                                    <span class="badge bg-{{ $faq->status == 'active' ? 'success' : 'danger' }}">
                                        {{ ucfirst($faq->status) }}
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
        <div class="modal custom-modal fade" id="edit_team{{ $faq->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">Edit FAQ</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ route('admin-room-facility.update', $faq->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-lg-12 mb-3">
                                    <label>Question *</label>
                                    <input type="text" name="question" class="form-control" value="{{ $faq->question }}">
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label>FAQ Answer <span class="text-danger">*</span></label>
                                    <!-- <input type="text" name="answer" class="form-control" placeholder="Enter Answer" required> -->
                                    <textarea type="text" name="answer" class="form-control"
                                        required>{{ $faq->answer }} </textarea>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label>Status *</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ $faq->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $faq->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
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
                        <h5 class="mt-3 mb-2">Delete FAQ?</h5>
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
        $('#deleteModal').on('show.bs.modal', function (event) {

            let button = $(event.relatedTarget);

            let facilityId = button.data('facility-id');
            let facilityTitle = button.data('facility-title');

            $('#deleteRoomName').text(facilityTitle);

            $('#deleteForm').attr(
                'action',
                '/admin-faq/' + facilityId
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