<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
  public function index()
{
    // ✅ Make sure to load permissions relationship
    $roles = Role::with(['permissions', 'users'])->latest()->get();
    $permissions = Permission::orderBy('name')->get();
    
    return view('backend.pages.roles.index', compact('roles', 'permissions'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:roles,name',
            'status' => 'required|in:active,inactive',
        ]);

        $role = Role::create([
            'name' => $request->name, 
            'guard_name' => 'web',
            'status' => $request->status
        ]);

        // ✅ FIX: Sync permissions by ID using Permission model
        if ($request->has('permissions') && is_array($request->permissions)) {
            $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');
            $role->syncPermissions($permissions);
        }

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function assignPermissions(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'nullable|array'
        ]);

        $role = Role::findById($request->role_id);
        
        // ✅ FIX: Convert permission IDs to names before syncing
        if ($request->has('permissions') && is_array($request->permissions)) {
            $permissionNames = Permission::whereIn('id', $request->permissions)->pluck('name');
            $role->syncPermissions($permissionNames);
        } else {
            // Remove all permissions if none selected
            $role->syncPermissions([]);
        }

        return redirect()->back()->with('success', 'Permissions updated successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        $role = Role::findById($id);
        $role->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::findById($id);
        $role->delete();

        return redirect()->back()->with('success', 'Role deleted successfully');
    }

    public function toggleStatus($id)
    {
        $role = Role::findById($id);
        $newStatus = $role->status === 'active' ? 'inactive' : 'active';
        $role->update(['status' => $newStatus]);

        return redirect()->back()->with('success', "Role {$newStatus} successfully");
    }
}