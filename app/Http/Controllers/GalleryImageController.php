<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;
use App\Models\GalleryCategory;
class GalleryImageController extends Controller
{
    //
    public function index()
    {
        $images = GalleryImage::all();
        $categories = GalleryCategory::where('status', 'active')
            ->orderBy('name')
            ->get();
        return view('backend.pages.admin-gallery-images', compact('images', 'categories'));
        dd($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'category' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'image' => $path,
            'category' => $request->category,
            'status' => $request->status
        ]);

        return back()->with('success', 'Image added to gallery!');
    }
    public function update(Request $request, GalleryImage $galleryImage)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'category' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive'
        ]);

        $data = [
            'category' => $request->category,
            'status' => $request->status
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($galleryImage->image);
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $galleryImage->update($data);

        return back()->with('success', 'Image updated successfully!');
    }

    public function destroy(GalleryImage $galleryImage)
    {
        Storage::disk('public')->delete($galleryImage->image);
        $galleryImage->delete();

        return back()->with('success', 'Image deleted permanently!');
    }
}
