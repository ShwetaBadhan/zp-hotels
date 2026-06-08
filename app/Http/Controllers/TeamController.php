<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get();
        return view('backend.pages.admin-team', compact('teams'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'designation' => 'required|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team-images', 'public');
        }

        Team::create([
            'name' => $request->name,
            'image' => $imagePath,
            'designation' => $request->designation,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
            'status' => $request->status
        ]);

        return back()->with('success', 'Team member added successfully!');
    }
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'designation' => 'required|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = $team->image;

        if ($request->hasFile('image')) {
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }
            $imagePath = $request->file('image')->store('team-images', 'public');
        }

        $team->update([
            'name' => $request->name,
            'image' => $imagePath,
            'designation' => $request->designation,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
            'status' => $request->status
        ]);

        return back()->with('success', 'Team member updated successfully!');

    }
    public function destroy(Team $team)
    {
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();
        return back()->with('success', 'Team member deleted successfully!');
    }
}
