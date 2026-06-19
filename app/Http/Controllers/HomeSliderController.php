<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;
use illuminate\Support\Facades\Storage;
class HomeSliderController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::latest()->get();
        return view('backend.pages.admin-home-sliders', compact('sliders'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('slider', 'public');
        }

        HomeSlider::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return back()->with('success', 'Slider added successfully!');
    }
    public function update(Request $request, HomeSlider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = $slider->image;

        if ($request->hasFile('image')) {
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $imagePath = $request->file('image')->store('slider', 'public');
        }

        $slider->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return back()->with('success', 'Slider updated successfully!');

    }
    public function destroy(HomeSlider $slider)
    {
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();
        return back()->with('success', 'Slider deleted successfully!');
    }
}
