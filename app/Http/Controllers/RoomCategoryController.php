<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomCategory;
use Illuminate\Support\Str;

class RoomCategoryController extends Controller
{
    public function index()
    {
        $categories = RoomCategory::latest()->get();
        return view('backend.pages.room-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.pages.room-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:room_categories,name',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'max_guests' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'size_sqft' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image',
            'images.*' => 'nullable|image',
            'status' => 'required|in:active,inactive',
        ]);

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')
                ->store('room-categories/thumbnails', 'public');
        }

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('room-categories/images', 'public');
            }
        }

        RoomCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),

            'price' => $request->price,
            'offer_price' => $request->offer_price,

            'max_guests' => $request->max_guests,

            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,

            'size_sqft' => $request->size_sqft,

            'description' => $request->description,

            'thumbnail' => $thumbnail,
            'images' => $images,

            'amenities' => $request->amenities ?? [],

            'status' => $request->status,
        ]);

        return redirect()
            ->route('room-categories.index')
            ->with('success', 'Room category created successfully.');
    }

    public function edit($id)
    {
        $category = RoomCategory::findOrFail($id);

        return view(
            'backend.pages.room-categories.edit',
            compact('category')
        );
    }

    public function update(Request $request, $id)
    {
        $category = RoomCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:room_categories,name,' . $id,
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'max_guests' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'size_sqft' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image',
            'images.*' => 'nullable|image',
            'status' => 'required|in:active,inactive',
        ]);

        $thumbnail = $category->thumbnail;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')
                ->store('room-categories/thumbnails', 'public');
        }

        $images = $category->images ?? [];

        if ($request->hasFile('images')) {
            $images = [];

            foreach ($request->file('images') as $image) {
                $images[] = $image->store('room-categories/images', 'public');
            }
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),

            'price' => $request->price,
            'offer_price' => $request->offer_price,

            'max_guests' => $request->max_guests,

            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,

            'size_sqft' => $request->size_sqft,

            'description' => $request->description,

            'thumbnail' => $thumbnail,
            'images' => $images,

            'amenities' => $request->amenities ?? [],

            'status' => $request->status,
        ]);

        return redirect()
            ->route('room-categories.index')
            ->with('success', 'Room category updated successfully.');
    }

    public function destroy($id)
    {
        $category = RoomCategory::findOrFail($id);

        if ($category->rooms()->count() > 0) {
            return back()->with(
                'error',
                'Cannot delete category with assigned rooms.'
            );
        }

        $category->delete();

        return redirect()
            ->route('room-categories.index')
            ->with('success', 'Room category deleted successfully.');
    }
}