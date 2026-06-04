<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    public function index()
    {
        //  Load category relationship
        $rooms = Room::with('category')->orderBy('sort_order')->orderBy('name')->get();
        $categories = RoomCategory::where('status', 'active')->orderBy('name')->get();

        return view('backend.pages.rooms.index', compact('rooms', 'categories'));
    }

    public function store(Request $request)
    {
        // 🔍 Debug: Log incoming request
        Log::info('Room Store Request:', $request->all());
        // dd($request->all()); 
        $request->validate([
            'name' => 'required|string|max:150',
            'category_id' => 'required|exists:room_categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'max_guests' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
            'featured' => 'required|in:yes,no',
            // 🔥 Temporarily remove file validation to test
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Room name is required',
            'category_id.required' => 'Please select a category',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
        ]);

        try {

            $data = $request->except(['thumbnail', 'images']);

            $data['slug'] = Str::slug($request->name);
            $data['amenities'] = $request->amenities ?? [];
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')
                    ->store('rooms/thumbnails', 'public');
            }
            if ($request->hasFile('images')) {

                $images = [];

                foreach ($request->file('images') as $image) {
                    $images[] = $image->store('rooms/gallery', 'public');
                }

                $data['images'] = $images;
            }
            // dd($data);

            //  Debug: Log data before create
            Log::info('Creating room with data:', $data);

            $room = \App\Models\Room::create($data);

            Log::info('Room created successfully:', ['id' => $room->id]);

            return redirect()->route('rooms.index')->with('success', 'Room created successfully!');

        } catch (\Exception $e) {
            //  Debug: Log the error
            Log::error('Room creation failed:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create room: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'category_id' => 'required|exists:room_categories,id',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:300',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0|lt:price',
            'max_guests' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'size_sqft' => 'nullable|integer|min:0',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'amenities' => 'nullable|array',
            'status' => 'required|in:active,inactive',
            'featured' => 'required|in:yes,no',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $room = Room::findOrFail($id);
        $data = $request->except(['thumbnail', 'images']);
        $data['slug'] = Str::slug($request->name);
        $data['amenities'] = $request->amenities ?? [];
        $existingImages = json_decode($request->existing_images, true) ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $existingImages[] = $image->store('rooms/gallery', 'public');
            }
        }

        $data['images'] = $existingImages;
        // Handle thumbnail upload (replace)
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($room->thumbnail)
                Storage::disk('public')->delete($room->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('rooms/thumbnails', 'public');
        }

        $room->update($data);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        // Delete images from storage
        if ($room->thumbnail)
            Storage::disk('public')->delete($room->thumbnail);
        if ($room->images) {
            foreach ($room->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $room = Room::findOrFail($id);
        $newStatus = $room->status === 'active' ? 'inactive' : 'active';
        $room->update(['status' => $newStatus]);

        return redirect()->back()->with('success', "Room {$newStatus} successfully");
    }

    public function toggleFeatured($id)
    {
        $room = Room::findOrFail($id);
        $newFeatured = $room->featured === 'yes' ? 'no' : 'yes';
        $room->update(['featured' => $newFeatured]);

        return redirect()->back()->with('success', "Room marked as " . ($newFeatured === 'yes' ? 'featured' : 'normal'));
    }

    // Frontend: Show room details
    public function show($slug)
    {
        $room = Room::with('category')->where('slug', $slug)->where('status', 'active')->firstOrFail();
        $relatedRooms = Room::where('category_id', $room->category_id)
            ->where('id', '!=', $room->id)
            ->where('status', 'active')
            ->limit(4)
            ->get();

        return view('frontend.pages.rooms.room-details', compact('room', 'relatedRooms'));
    }
}