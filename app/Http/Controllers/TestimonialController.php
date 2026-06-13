<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
class TestimonialController extends Controller
{
    //
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.pages.admin-testimonial', compact('testimonials'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'designation' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonial-images', 'public');
        }

        Testimonial::create([
            'name' => $request->name,
            'image' => $imagePath,
            'designation' => $request->designation,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return back()->with('success', 'Testimonial added successfully!');
    }
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'designation' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = $testimonial->image;

        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $imagePath = $request->file('image')->store('tetsimonial-images', 'public');
        }

        $testimonial->update([
            'name' => $request->name,
            'image' => $imagePath,
            'designation' => $request->designation,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return back()->with('success', 'Testimonial updated successfully!');

    }
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted successfully!');
    }
}
