<?php

namespace App\Http\Controllers;

use App\Models\RoomFacility;
use Illuminate\Http\Request;

class RoomFacilityController extends Controller
{
    public function index()
    {
        $facilities = RoomFacility::latest()->get();
        return view('backend.pages.admin-room-facilities', compact('facilities'));
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'list' => 'required|array',
            'list.*' => 'required|string|max:255',
        ]);

        RoomFacility::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'list' => array_values(array_filter($request->list)),
        ]);

        return redirect()->route('admin-room-facility.index')
            ->with('success', 'Facility created successfully.');
    }

    

    public function update(Request $request, RoomFacility $facility)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'list' => 'required|array',
            'list.*' => 'required|string|max:255',
        ]);

        $facility->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'list' => array_values(array_filter($request->list)),
        ]);

        return redirect()->route('admin-room-facility.index')
            ->with('success', 'Facility updated successfully.');
    }

    public function destroy(RoomFacility $facility)
    {
        $facility->delete();

        return redirect()->route('admin-room-facility.index')
            ->with('success', 'Facility deleted successfully.');
    }
}
