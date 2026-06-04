@extends('backend.layouts.master')
@section('content')
    <div class="lh-main-content">
        <div class="container-fluid">
            <div class="lh-page-title">
                <div class="lh-breadcrumb">
                    <h5>Users</h5>
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a></li>
                        <li>Users</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="lh-card">
                        <div class="lh-card-header">
                            <h4 class="lh-card-title">Users</h4>
                        </div>
                        <div class="lh-card-content">
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#createModal">
                                <i class="ri-add-line me-1"></i> Create User
                            </button>

                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Roles</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-circle me-2 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                                            style="width:36px;height:36px;font-weight:600;">
                                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                                        </div>
                                                        <div>
                                                            <div class="fw-medium">{{ $user->name }}</div>
                                                            <small class="text-muted">{{ $user->email }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @forelse($user->roles as $role)
                                                        <span class="badge bg-primary me-1 mb-1">{{ ucfirst($role->name) }}</span>
                                                    @empty
                                                        <span class="text-muted small">No roles</span>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge {{ $user->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                        {{ ucfirst($user->status) }}
                                                    </span>
                                                </td>
                                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                                <td class="text-center" style="white-space: nowrap;">
                                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                                        <!-- Toggle Status -->
                                                        <button type="button"
                                                            class="btn btn-sm {{ $user->status === 'active' ? 'btn-outline-warning' : 'btn-outline-success' }}"
                                                            onclick="toggleStatus({{ $user->id }}, '{{ $user->status }}')"
                                                            title="Toggle Status">
                                                            <i
                                                                class="ri-toggle-{{ $user->status === 'active' ? 'fill' : 'line' }}"></i>
                                                        </button>


                                                        <!-- Edit -->
                                                        <button type="button" class="btn btn-sm btn-outline-success"
                                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                                            data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}"
                                                            data-user-email="{{ $user->email }}"
                                                            data-user-status="{{ $user->status }}"
                                                            data-user-roles="@json($user->roles->pluck('id'))">
                                                            <i class="ri-edit-line"></i>
                                                        </button>

                                                        <!-- Delete -->
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">
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

    <!-- CREATE MODAL -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required minlength="6">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <!-- In Create Modal, replace the roles section -->
                            <div class="col-md-6">
                                <label class="form-label">Assign Role</label>
                                <select name="role" class="form-select">
                                    <option value="">-- Select Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Only one role can be assigned</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form id="editForm" method="POST">
                @csrf @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" id="editName" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="editEmail" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">New Password <small class="text-muted">(optional)</small></label>
                                <input type="password" name="password" class="form-control" minlength="6">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" id="editStatus" class="form-select" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <!-- In Edit Modal, replace the roles section -->
                            <div class="col-md-6">
                                <label class="form-label">Assign Role</label>
                                <select name="role" id="editRole" class="form-select">
                                    <option value="">-- Select Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- ASSIGN ROLE MODAL (Single) -->
    <div class="modal fade" id="assignRolesModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="assignRolesForm" method="POST">
                @csrf @method('PUT')
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title"><i class="ri-shield-line me-2"></i>Assign Role - <span
                                id="assignUserName"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info small">
                            <i class="ri-information-line me-1"></i> Select one role to assign to this user.
                        </div>
                        <div class="list-group">
                            <!-- None/Remove Role Option -->
                            <label class="list-group-item d-flex gap-2">
                                <input class="form-check-input flex-shrink-0 role-radio" type="radio" name="role" value=""
                                    id="role_none">
                                <div>
                                    <strong class="d-block">No Role</strong>
                                    <small class="text-muted">Remove assigned role</small>
                                </div>
                            </label>

                            @foreach ($roles as $role)
                                <label class="list-group-item d-flex gap-2">
                                    <input class="form-check-input flex-shrink-0 role-radio" type="radio" name="role"
                                        value="{{ $role->id }}" id="role_{{ $role->id }}">
                                    <div>
                                        <strong class="d-block">{{ ucfirst($role->name) }}</strong>
                                        <small class="text-muted">Guard: {{ $role->guard_name }}</small>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Role</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <form id="deleteForm" method="POST">
                @csrf @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title"><i class="ri-alert-fill me-2"></i>Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center py-4">
                        <i class="ri-delete-bin-line text-danger" style="font-size: 3rem;"></i>
                        <h5 class="mt-3 mb-2">Delete User?</h5>
                        <p class="text-muted mb-0" id="deleteUserName"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // SweetAlert notifications (same as before)
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        @endif
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        @endif
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                html: '<ul class="text-start mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>',
                timer: 5000
            });
        @endif

        // Toggle Status (same as before)
        function toggleStatus(id, current) {
            Swal.fire({
                title: 'Change Status?',
                text: `This user will be ${current === 'active' ? 'inactive' : 'active'}`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: current === 'active' ? '#ffc107' : '#28a745',
                confirmButtonText: 'Yes, Change'
            }).then(r => {
                if (r.isConfirmed) {
                    const f = document.createElement('form');
                    f.method = 'POST';
                    f.action = `{{ url('users') }}/${id}/toggle-status`;
                    f.innerHTML =
                        `<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="PATCH">`;
                    document.body.appendChild(f);
                    f.submit();
                }
            });
        }

        // Edit Modal - Populate fields
        document.getElementById('editModal').addEventListener('show.bs.modal', function (e) {
            const b = e.relatedTarget;
            const userId = b.getAttribute('data-user-id');

            document.getElementById('editForm').action = `{{ url('users') }}/${userId}`;
            document.getElementById('editName').value = b.getAttribute('data-user-name');
            document.getElementById('editEmail').value = b.getAttribute('data-user-email');
            document.getElementById('editStatus').value = b.getAttribute('data-user-status');

            // Pre-select assigned role (single)
            const assignedRoles = JSON.parse(b.getAttribute('data-user-roles') || '[]');
            const assignedRoleId = assignedRoles.length > 0 ? assignedRoles[0] : '';
            document.getElementById('editRole').value = assignedRoleId;
        });

        // Assign Role Modal - Populate radio buttons
        document.getElementById('assignRolesModal').addEventListener('show.bs.modal', function (e) {
            const b = e.relatedTarget;
            const userId = b.getAttribute('data-user-id');

            document.getElementById('assignRolesForm').action = `{{ url('users') }}/${userId}`;
            document.getElementById('assignUserName').textContent = b.getAttribute('data-user-name');

            // Pre-check assigned role (single)
            const assignedRoles = JSON.parse(b.getAttribute('data-user-roles') || '[]');
            const assignedRoleId = assignedRoles.length > 0 ? assignedRoles[0] : '';

            document.querySelectorAll('.role-radio').forEach(radio => {
                radio.checked = (radio.value == assignedRoleId);
            });
        });

        // Delete Modal (same as before)
        document.getElementById('deleteModal').addEventListener('show.bs.modal', function (e) {
            const b = e.relatedTarget;
            const userId = b.getAttribute('data-user-id');

            document.getElementById('deleteForm').action = `{{ url('users') }}/${userId}`;
            document.getElementById('deleteUserName').textContent = b.getAttribute('data-user-name');
        });
    </script>
@endpush