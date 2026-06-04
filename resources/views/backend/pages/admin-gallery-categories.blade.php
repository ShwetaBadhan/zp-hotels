@extends('backend.layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="lh-main-content">
        <div class=" container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>Gallery Categories</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>Gallery Categories</li>
                    </ul>
                </div>
            </div>


            <!-- Table -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="lh-card">
                        <div class="lh-card-header">
                            <h4 class="lh-card-title">Categories</h4>
                        </div>
                        <div class="lh-card-content">

                            <a class="btn btn-primary mb-3" href="javascript:void(0);" data-bs-toggle="modal"
                                data-bs-target="#add_inventory"> <i class="ri-add-line me-1"></i> Create Category</a>

                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Status</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($categories as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="fw-medium">{{ $item->name }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $item->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ ucfirst($item->status) }}
                                                    </span>
                                                </td>

                                                <td class="text-center" style="white-space: nowrap;">
                                                    <div
                                                        class="d-flex justify-content-center align-items-center justify-content-center gap-2">

                                                        <button class=" btn btn-sm btn-outline-warning" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                                            <i class="ri-edit-line "></i></button>

                                                        <form action="{{ route('admin-gallery-categories.destroy', $item) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        </form>


                                                        </ul>
                                                    </div>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td class="text-center">No Gallery Category found.</td>
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

            <!-- /Table -->

        </div>
    </div>
    <!-- /Page Wrapper -->







    <!-- Add Inventory -->
    <div class="modal custom-modal fade" id="add_inventory" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Add Gallery Category</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('admin-gallery-categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label>Category Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="input-block mb-0">
                                    <label>Status<span class="text-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-back cancel-btn me-2">Cancel</button>
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Inventory -->

    <!-- Edit Inventory -->
    @foreach($categories as $item)




        {{-- edit modal --}}

        <div class="modal fade" id="edit{{ $item->id }}">
            <div class="modal-dialog custom-modal">
                <form action="{{ route('admin-gallery-categories.update', $item) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Edit Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">

                                <div class="col-12">
                                    <label>Category Name</label>
                                    <input type="text" name="name" value="{{ old('name', $item->name) }}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $item->status == 'inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <!-- /Edit Inventory -->

    <!-- Delete Stock Modal -->
    <div class="modal custom-modal fade" id="delete_stock" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Category</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="#" class="btn btn-primary paid-continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="#" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Stock Modal -->





@endsection
@push('scripts')
    <script>
               @if(session('success')) Swal.fire({ icon: 'success', title: 'Success!', text: '{{ session('success') }}', timer: 3000, showConfirmButton: false }); @endif
        @if(session('error')) Swal.fire({ icon: 'error', title: 'Error!', text: '{{ session('error') }}', timer: 3000, showConfirmButton: false }); @endif
        @if($errors->any()) Swal.fire({ icon: 'error', title: 'Error!', html: '<ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>', timer: 5000 }); @endif

        $(function () {


            // SweetAlert2 Delete Confirmation (same as FAQs)
            $('.delete-btn').click(function (e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Delete Category?',
                    text: "This category will be permanently deleted !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush