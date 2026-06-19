<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NearbyAttraction;
use Illuminate\Support\Facades\Storage;
class NearbyAttractionController extends Controller
{
    public function index()
    {
        $attractions = NearbyAttraction::latest()->get();
        return view('backend.pages.admin-nearby-attraction', compact('attractions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('attraction', 'public');
        }

        NearbyAttraction::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return back()->with('success', 'Nearby Attraction added successfully!');
    }
    public function update(Request $request, NearbyAttraction $attraction)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = $attraction->image;

        if ($request->hasFile('image')) {
            if ($attraction->image) {
                Storage::disk('public')->delete($attraction->image);
            }
            $imagePath = $request->file('image')->store('attraction', 'public');
        }

        $attraction->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return back()->with('success', 'Nearby attraction updated successfully!');

    }
    public function destroy(NearbyAttraction $attraction)
    {
        if ($attraction->image) {
            Storage::disk('public')->delete($attraction->image);
        }

        $attraction->delete();
        return back()->with('success', 'Nearby Attraction deleted successfully!');
    }
}
