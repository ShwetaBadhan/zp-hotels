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
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="ri-add-line me-1"></i> Create Category
                        </button>

                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Rooms</th>
                                        <th>Status</th>
                                        <th>Sort</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div>
                                                <div class="fw-medium">{{ $category->name }}</div>
                                                <small class="text-muted">{{ Str::limit($category->description, 50) }}</small>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-info">{{ $category->getActiveRoomsCount() }}</span></td>
                                        <td>
                                            <span class="badge {{ $category->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ ucfirst($category->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $category->sort_order }}</td>
                                        <td class="text-center" style="white-space: nowrap;">
                                            <div class="d-flex justify-content-center align-items-center gap-1">
                                                <button type="button" class="btn btn-sm {{ $category->status === 'active' ? 'btn-outline-warning' : 'btn-outline-success' }}"
                                                        onclick="toggleStatus({{ $category->id }}, '{{ $category->status }}')" title="Toggle Status">
                                                    <i class="ri-toggle-{{ $category->status === 'active' ? 'fill' : 'line' }}"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-success"
                                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                                        data-cat-id="{{ $category->id }}"
                                                        data-cat-name="{{ $category->name }}"
                                                        data-cat-desc="{{ $category->description }}"
                                                        data-cat-status="{{ $category->status }}"
                                                        data-cat-sort="{{ $category->sort_order }}">
                                                    <i class="ri-edit-line"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-cat-id="{{ $category->id }}"
                                                        data-cat-name="{{ $category->name }}">
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
        <form action="{{ route('room-categories.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="0" min="0">
                        </div>
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
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="name" id="editName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="editDesc" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label">Status</label>
                            <select name="status" id="editStatus" class="form-select" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" id="editSort" class="form-control" min="0">
                        </div>
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
                    <p>Are you sure you want to delete:</p>
                    <h5 class="text-danger fw-bold" id="deleteCatName"></h5>
                    <p class="text-warning small mb-0" id="deleteWarning"></p>
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
@if(session('success')) Swal.fire({icon:'success',title:'Success!',text:'{{ session('success') }}',timer:3000,showConfirmButton:false}); @endif
@if(session('error')) Swal.fire({icon:'error',title:'Error!',text:'{{ session('error') }}',timer:3000,showConfirmButton:false}); @endif
@if($errors->any()) Swal.fire({icon:'error',title:'Error!',html:'<ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>',timer:5000}); @endif

function toggleStatus(id, current) {
    Swal.fire({title:'Change Status?',text:`Category will be ${current==='active'?'inactive':'active'}`,icon:'question',showCancelButton:true,confirmButtonText:'Yes'}).then(r=>{
        if(r.isConfirmed){const f=document.createElement('form');f.method='POST';f.action=`{{ url('room-categories') }}/${id}/toggle-status`;f.innerHTML=`<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="PATCH">`;document.body.appendChild(f);f.submit();}
    });
}

document.getElementById('editModal').addEventListener('show.bs.modal',e=>{
    const b=e.relatedTarget;
    document.getElementById('editForm').action=`{{ url('room-categories') }}/${b.getAttribute('data-cat-id')}`;
    document.getElementById('editName').value=b.getAttribute('data-cat-name');
    document.getElementById('editDesc').value=b.getAttribute('data-cat-desc');
    document.getElementById('editStatus').value=b.getAttribute('data-cat-status');
    document.getElementById('editSort').value=b.getAttribute('data-cat-sort');
});

document.getElementById('deleteModal').addEventListener('show.bs.modal',e=>{
    const b=e.relatedTarget;
    document.getElementById('deleteForm').action=`{{ url('room-categories') }}/${b.getAttribute('data-cat-id')}`;
    document.getElementById('deleteCatName').textContent=b.getAttribute('data-cat-name');
});
</script>
@endpush
@endsection