<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

use Illuminate\Support\Facades\Storage;
class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::latest()->get();
        return view('backend.pages.admin-facility', compact('facilities'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('facility', 'public');
        }

        Facility::create([
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return back()->with('success', 'Facility added successfully!');
    }
    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = $facility->image;

        if ($request->hasFile('image')) {
            if ($facility->image) {
                Storage::disk('public')->delete($facility->image);
            }
            $imagePath = $request->file('image')->store('facility', 'public');
        }

        $facility->update([
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return back()->with('success', 'Facility updated successfully!');

    }
    public function destroy(Facility $facility)
    {
        if ($facility->image) {
            Storage::disk('public')->delete($facility->image);
        }

        $facility->delete();
        return back()->with('success', 'Facility deleted successfully!');
    }
}
