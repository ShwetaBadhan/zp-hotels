<form id="editRoleForm" action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="roleName" class="form-label">Role Name</label>
        <input type="text" 
               class="form-control @error('name') is-invalid @enderror" 
               id="roleName" 
               name="name" 
               value="{{ old('name', $role->name) }}" 
               required
               autofocus>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="roleGuard" class="form-label">Guard Name</label>
        <select class="form-select @error('guard_name') is-invalid @enderror" 
                id="roleGuard" 
                name="guard_name" 
                required>
            <option value="web" {{ $role->guard_name == 'web' ? 'selected' : '' }}>web</option>
            <option value="api" {{ $role->guard_name == 'api' ? 'selected' : '' }}>api</option>
        </select>
        @error('guard_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="modal-footer px-0 pb-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">
            <i class="ri-save-line me-1"></i> Update Role
        </button>
    </div>
</form>