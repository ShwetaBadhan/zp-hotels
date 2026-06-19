<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('backend.pages.admin-event', compact('events'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('event', 'public');
        }

        Event::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'date' => $request->date,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return back()->with('success', 'Event added successfully!');
    }
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = $event->image;

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $imagePath = $request->file('image')->store('event', 'public');
        }

        $event->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'date' => $request->date,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return back()->with('success', 'Event updated successfully!');

    }
    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();
        return back()->with('success', 'Event deleted successfully!');
    }
}
