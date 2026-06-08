@extends('backend.layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="lh-main-content">
        <div class=" container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>Contact Leads</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>Contact Leads</li>
                    </ul>
                </div>
            </div>


            <!-- Table -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="lh-card">
                        <div class="lh-card-header">
                            <h4 class="lh-card-title">Leads</h4>
                        </div>
                        <div class="lh-card-content">



                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Enquiry For</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($leads as $lead)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="fw-medium">{{ $lead->name }}</td>
                                                <td class="fw-medium">{{ $lead->phone }}</td>
                                                <td class="fw-medium">
                                                    {{ $lead->enuiry_for ? $lead->enuiry_for : 'Contact request' }}
                                                </td>


                                                <td class="text-center" style="white-space: nowrap;">
                                                    <div
                                                        class="d-flex justify-content-center align-items-center justify-content-center gap-2">

                                                        <button class=" btn btn-sm btn-outline-warning" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#view{{ $lead->id }}">
                                                            <i class="ri-eye-line"></i></button>

                                                        <form action="{{ route('admin-contact-leads.destroy', $lead) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-outline-danger delete-btn">
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
                                                <td class="text-center">No Leads found.</td>
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









    <!-- Edit Inventory -->
    @foreach($leads as $lead)




        {{-- edit modal --}}

        <div class="modal fade" id="view{{ $lead->id }}">
            <div class="modal-dialog custom-modal">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">View Lead</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-bordered table-striped mb-0">

                            <tr>
                                <th>Name :</th>
                                <td>{{ $lead->name }}</td>
                            </tr>

                            <tr>
                                <th>Email :</th>
                                <td>{{ $lead->email }}</td>
                            </tr>

                            <tr>
                                <th>Phone :</th>
                                <td>{{ $lead->phone }}</td>
                            </tr>

                            <tr>
                                <th>Enquiry For :</th>
                                <td>{{ $lead->enuiry_for ? $lead->enuiry_for : 'Contact Lead' }}</td>
                            </tr>
                            <tr>
                                <th>Check In Date :</th>
                                <td>{{ $lead->check_in }}</td>
                            </tr>

                            <tr>
                                <th>Check Out Date :</th>
                                <td>{{ $lead->check_out }}</td>
                            </tr>
                            <tr>
                                <th>Created At :</th>
                                <td>{{ $lead->created_at->format('d M Y, h:i A') }}</td>
                            </tr>

                            <tr>
                                <th>Updated At :</th>
                                <td>{{ $lead->updated_at->format('d M Y, h:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Message :</th>
                                <td >{{ $lead->message }}</td>
                            </tr>

                        </table>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>

                </div>
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
                        <h3>Delete Lead</h3>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


        $(function () {


            // SweetAlert2 Delete Confirmation (same as FAQs)
            $('.delete-btn').click(function (e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Delete Lead?',
                    text: "This Lead will be permanently deleted !",
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
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success', title: 'Success!', text: '{{ session("success") }}', timer: 3000,
                showConfirmButton: false
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
                icon: 'error',
                title: 'Error!',
                html: '<ul class="mb-0">@foreach($errors->all() as $e) < li>{{ $e }}</li> @endforeach </ul> ',
                timer: 5000
            });
        </script>
    @endif

@endpush