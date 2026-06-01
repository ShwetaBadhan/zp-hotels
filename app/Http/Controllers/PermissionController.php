<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('name')->get();
        return view('backend.pages.permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:permissions,name',
            'guard_name' => 'required|in:web,api',
            'status' => 'required|in:active,inactive',
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
            'status' => $request->status,
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:permissions,name,' . $id,
            'guard_name' => 'required|in:web,api',
            'status' => 'required|in:active,inactive',
        ]);

        $permission = Permission::findById($id);
        $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
            'status' => $request->status,
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy($id)
    {
        $permission = Permission::findById($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $permission = Permission::findById($id);
        $newStatus = $permission->status === 'active' ? 'inactive' : 'active';
        $permission->update(['status' => $newStatus]);

        return redirect()->back()->with('success', "Permission {$newStatus} successfully");
    }
}