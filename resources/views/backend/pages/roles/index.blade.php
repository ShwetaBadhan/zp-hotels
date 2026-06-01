@extends('backend.layouts.master')
@section('content')

<div class="lh-main-content">
    <div class="container-fluid">
        <div class="lh-page-title">
            <div class="lh-breadcrumb">
                <h5>Roles</h5>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li>Roles</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="lh-card">
                    <div class="lh-card-header">
                        <h4 class="lh-card-title">Roles</h4>
                    </div>
                    <div class="lh-card-content">
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="ri-add-line me-1"></i> Create Role
                        </button>

                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role Name</th>
                                        <th>Status</th>
                                        <th>Users</th>
                                        <th>Created</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($role->name === 'admin')
                                                    <i class="ri-shield-star-fill text-danger me-2"></i>
                                                @elseif($role->name === 'manager')
                                                    <i class="ri-shield-fill text-warning me-2"></i>
                                                @else
                                                    <i class="ri-shield-line text-primary me-2"></i>
                                                @endif
                                                <span class="fw-medium">{{ ucfirst($role->name) }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge {{ $role->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ ucfirst($role->status) }}
                                            </span>
                                        </td>
                                        <td><span class="badge bg-info">{{ $role->users->count() }}</span></td>
                                        <td>{{ $role->created_at->format('d/m/Y') }}</td>
                                        <td class="text-center" style="white-space: nowrap;">
                                            <div class="d-flex justify-content-center align-items-center gap-1">
                                                <!-- Toggle Status Button -->
                                                <button type="button" 
                                                        class="btn btn-sm {{ $role->status === 'active' ? 'btn-outline-warning' : 'btn-outline-success' }}"
                                                        onclick="toggleStatus({{ $role->id }}, '{{ $role->status }}')"
                                                        title="Toggle Status">
                                                    <i class="ri-toggle-{{ $role->status === 'active' ? 'fill' : 'line' }}"></i>
                                                </button>
                                                
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#assignModal" data-role-id="{{ $role->id }}" data-role-name="{{ ucfirst($role->name) }}">
                                                    <i class="ri-key-line"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#editModal" data-role-id="{{ $role->id }}" data-role-name="{{ $role->name }}" data-role-status="{{ $role->status }}">
                                                    <i class="ri-edit-line"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-role-id="{{ $role->id }}" data-role-name="{{ ucfirst($role->name) }}">
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
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Role Name</label>
                        <input type="text" name="name" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ASSIGN PERMISSIONS MODAL -->
<div class="modal fade" id="assignModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form action="{{ route('roles.assignPermissions') }}" method="POST">
            @csrf
            <input type="hidden" name="role_id" id="assignRoleId">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title"><i class="ri-key-line me-2"></i>Assign Permissions - <span id="assignRoleName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        @foreach($permissions as $permission)
                        <div class="col-md-4 col-sm-6">
                            <div class="form-check p-2 border rounded">
                                <input class="form-check-input permission-checkbox" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="perm_{{ $permission->id }}">
                                <label class="form-check-label" for="perm_{{ $permission->id }}">{{ ucwords(str_replace('_', ' ', $permission->name)) }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Permissions</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Role Name</label>
                        <input type="text" name="name" id="editRoleName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" id="editRoleStatus" class="form-select" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <p>Are you sure you want to delete:</p>
                    <h5 class="text-danger fw-bold" id="deleteRoleName"></h5>
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
// Store all role permissions data
const rolePermissions = @json($roles->mapWithKeys(function($role) {
    return [$role->id => $role->permissions->pluck('id')->toArray()];
}));

@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
    });
@endif

@if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '{{ session('error') }}',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
    });
@endif

@if($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Validation Error!',
        html: '<ul class="text-start mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
        timer: 5000,
        timerProgressBar: true
    });
@endif

// Assign Permissions Modal - WITH PRE-CHECKED PERMISSIONS
document.getElementById('assignModal').addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const roleId = button.getAttribute('data-role-id');
    const roleName = button.getAttribute('data-role-name');
    
    document.getElementById('assignRoleId').value = roleId;
    document.getElementById('assignRoleName').textContent = roleName;
    
    // Get assigned permissions for this role
    const assignedPerms = rolePermissions[roleId] || [];
    
    // Check/uncheck permissions
    document.querySelectorAll('.permission-checkbox').forEach(cb => {
        const permId = parseInt(cb.value);
        cb.checked = assignedPerms.includes(permId);
    });
});

// Edit Modal
document.getElementById('editModal').addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const roleId = button.getAttribute('data-role-id');
    const roleName = button.getAttribute('data-role-name');
    const roleStatus = button.getAttribute('data-role-status');
    
    document.getElementById('editForm').action = '{{ url('roles') }}/' + roleId;
    document.getElementById('editRoleName').value = roleName;
    if (roleStatus) {
        document.getElementById('editRoleStatus').value = roleStatus;
    }
});

// Delete Modal
document.getElementById('deleteModal').addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const roleId = button.getAttribute('data-role-id');
    document.getElementById('deleteForm').action = '{{ url('roles') }}/' + roleId;
    document.getElementById('deleteRoleName').textContent = button.getAttribute('data-role-name');
});

// Toggle Status Function
function toggleStatus(roleId, currentStatus) {
    Swal.fire({
        title: 'Change Status?',
        text: `This role will be ${currentStatus === 'active' ? 'inactive' : 'active'}`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: currentStatus === 'active' ? '#ffc107' : '#28a745',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Change',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `{{ url('roles') }}/${roleId}/toggle-status`;
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'PATCH';
            
            form.appendChild(csrfToken);
            form.appendChild(methodField);
            document.body.appendChild(form);
            form.submit();
        }
    });
}
</script>
@endpush