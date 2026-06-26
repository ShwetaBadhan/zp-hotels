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
        // Load rooms with their category
        $rooms = Room::with('category')->latest()->get();

        // Get all room categories
        $categories = RoomCategory::orderBy('name')->get();

        return view('backend.pages.rooms.index', compact('rooms', 'categories'));
    }

    public function store(Request $request)
    {
        Log::info('Room Store Request:', $request->all());

        $request->validate([
            'category_id' => 'required|exists:room_categories,id',
            'room_no' => 'required|string|max:255|unique:rooms,room_no',
            'floor' => 'nullable|integer',
            'status' => 'required|in:available,maintenance,inactive',
        ], [
            'category_id.required' => 'Please select a room category.',
            'category_id.exists' => 'Selected category is invalid.',
            'room_no.required' => 'Room number is required.',
            'room_no.unique' => 'This room number already exists.',
            'floor.integer' => 'Floor must be a number.',
            'status.required' => 'Please select room status.',
        ]);

        try {

            $room = Room::create([
                'category_id' => $request->category_id,
                'room_no' => $request->room_no,
                'floor' => $request->floor,
                'status' => $request->status,
            ]);

            Log::info('Room created successfully.', ['id' => $room->id]);

            return redirect()->route('rooms.index')
                ->with('success', 'Room created successfully.');

        } catch (\Exception $e) {

            Log::error('Room creation failed.', [
                'message' => $e->getMessage(),
                'request' => $request->all(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create room.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:room_categories,id',
            'room_no' => 'required|string|max:255|unique:rooms,room_no,' . $id,
            'floor' => 'nullable|integer',
            'status' => 'required|in:available,maintenance,inactive',
        ]);

        $room = Room::findOrFail($id);

        $room->update([
            'category_id' => $request->category_id,
            'room_no' => $request->room_no,
            'floor' => $request->floor,
            'status' => $request->status,
        ]);

        return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room deleted successfully.');
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
    // public function show($slug)
    // {
    //     $room = Room::with('category')->where('slug', $slug)->where('status', 'active')->firstOrFail();
    //     $relatedRooms = Room::where('category_id', $room->category_id)
    //         ->where('id', '!=', $room->id)
    //         ->where('status', 'active')
    //         ->limit(4)
    //         ->get();

    //     return view('frontend.pages.rooms.room-details', compact('room', 'relatedRooms'));
    // }
     public function show($slug)
    {
        $category = RoomCategory::where('slug', $slug)
                    ->where('status', 'active')
                    ->firstOrFail();

        return view('frontend.pages.rooms.room-details', compact('category'));
    }
    public function rooms()
    {
        $categories = RoomCategory::where('status', 'active')->get();

        return view('frontend.pages.rooms.rooms', compact('categories'));
    }
}