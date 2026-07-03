@extends('backend.layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div class="lh-main-content">
        <div class=" container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>Booking Leads</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>Booking Leads</li>
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
                                            <th>Booking No</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Room</th>
                                            <th>Check In</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($leads as $lead)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $lead->booking_no }}</td>
                                                <td>{{ $lead->name }}</td>
                                                <td>{{ $lead->phone }}</td>
                                                <td>{{ $lead->room->title ?? '-' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($lead->check_in)->format('d M Y') }}</td>
                                                <td>
                                                    <span class="badge
                                                                                    @if($lead->status == 'pending') bg-warning
                                                                                    @elseif($lead->status == 'confirmed') bg-success
                                                                                    @elseif($lead->status == 'checked_in') bg-info
                                                                                    @elseif($lead->status == 'checked_out') bg-secondary
                                                                                    @else bg-danger
                                                                                    @endif">
                                                        {{ ucfirst(str_replace('_', ' ', $lead->status)) }}
                                                    </span>
                                                </td>

                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center gap-2">

                                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                            data-bs-target="#view{{ $lead->id }}">
                                                            <i class="ri-eye-line"></i>
                                                        </button>

                                                        @can('delete')
                                                            <form action="{{ route('admin-booking-leads.destroy', $lead->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger delete-btn">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </button>
                                                            </form>
                                                        @endcan

                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">No Leads found.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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




        {{-- view modal --}}

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
                                <th width="35%">Booking No</th>
                                <td>{{ $lead->booking_no }}</td>

                                <th>Customer Name</th>
                                <td>{{ $lead->name }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $lead->email }}</td>

                                <th>Phone</th>
                                <td>{{ $lead->phone }}</td>
                            </tr>

                            <tr>
                                <th>City</th>
                                <td>{{ $lead->city ?? '-' }}</td>

                                <th>Room</th>
                                <td>{{ $lead->room->title ?? '-' }}</td>
                            </tr>


                            <tr>
                                <th>Check In</th>
                                <td>{{ \Carbon\Carbon::parse($lead->check_in)->format('d M Y') }}</td>

                                <th>Check Out</th>
                                <td>{{ \Carbon\Carbon::parse($lead->check_out)->format('d M Y') }}</td>
                            </tr>


                            <tr>
                                <th>Adults</th>
                                <td>{{ $lead->adults }}</td>

                                <th>Children</th>
                                <td>{{ $lead->children }}</td>
                            </tr>

                            <tr>
                                <th>Price</th>
                                <td>₹{{ number_format($lead->price, 2) }}</td>

                                <th>Total Amount</th>
                                <td>₹{{ number_format($lead->total_amount, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $lead->category->name ?? '-' }}</td>
                            
                                <th>Status</th>
                                <td>
                                    <span class="badge
                                                @if($lead->status == 'pending') bg-warning
                                                @elseif($lead->status == 'confirmed') bg-success
                                                @elseif($lead->status == 'checked_in') bg-info
                                                @elseif($lead->status == 'checked_out') bg-secondary
                                                @else bg-danger
                                                @endif">
                                        {{ ucfirst(str_replace('_', ' ', $lead->status)) }}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <th>Special Request</th>
                                <td colspan="3">{{ $lead->special_request ?: '-' }}</td>
                            </tr>

                            <tr>
                                <th>Created At</th>
                                <td colspan="3">{{ $lead->created_at->format('d M Y h:i A') }}</td>
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