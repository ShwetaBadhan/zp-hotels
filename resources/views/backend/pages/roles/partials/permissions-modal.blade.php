<form id="assignPermissionsForm" action="{{ route('roles.assignPermissions') }}" method="POST">
    @csrf
    @method('PUT')
    
    <input type="hidden" name="role_id" value="{{ $role->id }}">
    
    <div class="mb-3">
        <h6 class="text-muted mb-3">
            Role: <span class="text-primary fw-bold">{{ ucfirst($role->name) }}</span>
        </h6>
    </div>
    
    <div class="row g-2">
        @forelse($permissions as $permission)
        <div class="col-md-4 col-sm-6">
            <div class="form-check p-2 border rounded">
                <input class="form-check-input" 
                       type="checkbox" 
                       name="permissions[]" 
                       value="{{ $permission->id }}" 
                       id="perm_{{ $permission->id }}"
                       {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}>
                <label class="form-check-label fw-medium" for="perm_{{ $permission->id }}">
                    {{ ucwords(str_replace('_', ' ', $permission->name)) }}
                </label>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">No permissions available</div>
        </div>
        @endforelse
    </div>
    
    <div class="modal-footer px-0 pb-0 mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">
            <i class="ri-save-line me-1"></i> Save Changes
        </button>
    </div>
</form>