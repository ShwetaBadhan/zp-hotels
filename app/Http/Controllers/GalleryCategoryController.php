<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryCategoryController extends Controller
{
    //


    public function index()
    {
        $categories = GalleryCategory::all();
        return view('backend.pages.admin-gallery-categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
           
            'name' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive'
        ]);

       

        GalleryCategory::create([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return back()->with('success', 'category added Successfully!');
    }

    public function update(Request $request, GalleryCategory $category)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $data = [
            'name' => $request->name,
            'status' => $request->status
        ];

       

        $category->update($data);

        return back()->with('success', 'Category updated successfully!');
    }

    public function destroy(GalleryCategory $category)
    {
       
        $category->delete();

        return back()->with('success', 'Category deleted permanently!');
    }
}
