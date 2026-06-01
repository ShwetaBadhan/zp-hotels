@extends('backend.layouts.master')
@section('content')

<div class="lh-main-content">
    <div class="container-fluid">
        <div class="lh-page-title">
            <div class="lh-breadcrumb">
                <h5>Permissions</h5>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li>Permissions</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="lh-card">
                    <div class="lh-card-header">
                        <h4 class="lh-card-title">Permissions</h4>
                    </div>
                    <div class="lh-card-content">
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="ri-add-line me-1"></i> Create Permission
                        </button>

                        <div class="table-responsive">
                            <table class="table align-middle datatables">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Permission Name</th>
                                        <th>Guard</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="fw-medium">{{ ucfirst(str_replace('_', ' ', $permission->name)) }}</span>
                                        </td>
                                        <td><span class="badge bg-secondary">{{ $permission->guard_name }}</span></td>
                                        <td>
                                            <span class="badge {{ $permission->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ ucfirst($permission->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $permission->created_at->format('d/m/Y') }}</td>
                                        <td class="text-center" style="white-space: nowrap;">
                                            <div class="d-flex justify-content-center align-items-center gap-1">
                                                <!-- Toggle Status -->
                                                <button type="button" 
                                                        class="btn btn-sm {{ $permission->status === 'active' ? 'btn-outline-warning' : 'btn-outline-success' }}"
                                                        onclick="toggleStatus({{ $permission->id }}, '{{ $permission->status }}')"
                                                        title="Toggle Status">
                                                    <i class="ri-toggle-{{ $permission->status === 'active' ? 'fill' : 'line' }}"></i>
                                                </button>
                                                
                                                <!-- Edit -->
                                                <button type="button" class="btn btn-sm btn-outline-success"
                                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                                        data-perm-id="{{ $permission->id }}"
                                                        data-perm-name="{{ $permission->name }}"
                                                        data-perm-guard="{{ $permission->guard_name }}"
                                                        data-perm-status="{{ $permission->status }}">
                                                    <i class="ri-edit-line"></i>
                                                </button>
                                                
                                                <!-- Delete -->
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-perm-id="{{ $permission->id }}"
                                                        data-perm-name="{{ ucfirst(str_replace('_', ' ', $permission->name)) }}">
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
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Permission Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. view-users" required autofocus>
                        <small class="text-muted">Use lowercase with hyphens (e.g. <code>view-users</code>)</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guard</label>
                        <select name="guard_name" class="form-select" required>
                            <option value="web">web</option>
                            <option value="api">api</option>
                        </select>
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

<!-- EDIT MODAL -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form id="editForm" method="POST">
            @csrf @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Permission Name</label>
                        <input type="text" name="name" id="editPermName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guard</label>
                        <select name="guard_name" id="editPermGuard" class="form-select" required>
                            <option value="web">web</option>
                            <option value="api">api</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" id="editPermStatus" class="form-select" required>
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
            @csrf @method('DELETE')
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="ri-delete-bin-line text-danger" style="font-size: 3rem;"></i>
                    <h5 class="mt-3 mb-2">Delete Permission?</h5>
                    <p class="text-muted mb-0" id="deletePermName"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// SweetAlert notifications
@if(session('success'))
    Swal.fire({icon:'success',title:'Success!',text:'{{ session('success') }}',timer:3000,timerProgressBar:true,showConfirmButton:false});
@endif
@if(session('error'))
    Swal.fire({icon:'error',title:'Error!',text:'{{ session('error') }}',timer:3000,timerProgressBar:true,showConfirmButton:false});
@endif
@if($errors->any())
    Swal.fire({icon:'error',title:'Validation Error!',html:'<ul class="text-start mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>',timer:5000});
@endif

// Toggle Status
function toggleStatus(id, current) {
    Swal.fire({
        title:'Change Status?',
        text:`This permission will be ${current==='active'?'inactive':'active'}`,
        icon:'question',showCancelButton:true,
        confirmButtonColor:current==='active'?'#ffc107':'#28a745',
        confirmButtonText:'Yes, Change'
    }).then(r=>{
        if(r.isConfirmed){
            const f=document.createElement('form');
            f.method='POST';f.action=`{{ url('permissions') }}/${id}/toggle-status`;
            f.innerHTML=`<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="PATCH">`;
            document.body.appendChild(f);f.submit();
        }
    });
}

// Edit Modal
document.getElementById('editModal').addEventListener('show.bs.modal',e=>{
    const b=e.relatedTarget;
    document.getElementById('editForm').action=`{{ url('permissions') }}/${b.getAttribute('data-perm-id')}`;
    document.getElementById('editPermName').value=b.getAttribute('data-perm-name');
    document.getElementById('editPermGuard').value=b.getAttribute('data-perm-guard');
    document.getElementById('editPermStatus').value=b.getAttribute('data-perm-status');
});

// Delete Modal
document.getElementById('deleteModal').addEventListener('show.bs.modal',e=>{
    const b=e.relatedTarget;
    document.getElementById('deleteForm').action=`{{ url('permissions') }}/${b.getAttribute('data-perm-id')}`;
    document.getElementById('deletePermName').textContent=b.getAttribute('data-perm-name');
});
</script>
@endpush
@endsection