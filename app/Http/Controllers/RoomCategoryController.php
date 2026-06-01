<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomCategory;
use Illuminate\Support\Str;

class RoomCategoryController extends Controller
{
    public function index()
    {
        $categories = RoomCategory::orderBy('sort_order')->orderBy('name')->get();
        return view('backend.pages.room-categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:room_categories,name',
            'description' => 'nullable|string|max:500',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        RoomCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => $request->status,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('room-categories.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:room_categories,name,' . $id,
            'description' => 'nullable|string|max:500',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $category = RoomCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => $request->status,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('room-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = RoomCategory::findOrFail($id);
        
        // Prevent deletion if category has rooms
        if ($category->rooms()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete category with assigned rooms.');
        }
        
        $category->delete();
        return redirect()->route('room-categories.index')->with('success', 'Category deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $category = RoomCategory::findOrFail($id);
        $newStatus = $category->status === 'active' ? 'inactive' : 'active';
        $category->update(['status' => $newStatus]);

        return redirect()->back()->with('success', "Category {$newStatus} successfully");
    }
}