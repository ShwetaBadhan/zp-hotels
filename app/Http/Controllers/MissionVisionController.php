<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MissionVision;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class MissionVisionController extends Controller
{
    public function index()
    {
        $missionVisionSection = MissionVision::firstOrCreate(
            [],
            [
                'sub_title' => 'Our Purpose',
                'main_title' => 'Mission & Vision',
                'mission_main_title' => 'Delivering Exceptional Hospitality',
                'mission_sub_title' => 'Our Mission',
                'vision_sub_title' => 'our Vision',
                'vision_main_title' => 'Shaping the Future of Hospitality',
                'mission' => 'At our hotel, our mission is to provide exceptional hospitality through personalized service, comfortable accommodations, and memorable experiences. We are dedicated to creating a welcoming environment where every guest feels valued, cared for, and inspired to return. Through attention to detail and a commitment to excellence, we strive to make every stay truly unforgettable.',
                'vision' => 'Our vision is to be a preferred destination for travelers seeking comfort, luxury, and genuine hospitality. We aspire to set new standards in guest satisfaction by continuously enhancing our services, embracing innovation, and creating experiences that leave a lasting impression. Through our passion for hospitality, we aim to build meaningful connections with guests from around the world.',
                'is_active' => true
            ]
        );

        return view('backend.pages.admin-mission-vision', compact('missionVisionSection'));
    }

    public function update(Request $request)
    {
        $missionVisionSection = MissionVision::firstOrFail();

        $request->validate([

            'sub_title' => 'required|string|max:200',
            'main_title' => 'required|string|max:200',
            'mission_sub_title' => 'required|string|max:200',
            'mission_main_title' => 'required|string|max:200',
            'mission' => 'required|string',
            'vision_sub_title' => 'required|string|max:200',
            'vision_main_title' => 'required|string|max:200',
            'vision' => 'nullable|string',
            'mision_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean'
        ]);

        $data = $request->only([

            'sub_title',
            'main_title',
            'mission_sub_title',
            'mission_main_title',
            'mission',
            'vision_sub_title',
            'vision_main_title',
            'vision',
            'is_active'
        ]);

        // Handle main image upload
        if ($request->hasFile('mission_image')) {
            // Delete old image if exists
            if ($missionVisionSection->mission_image && Storage::disk('public')->exists($missionVisionSection->mission_image)) {
                Storage::disk('public')->delete($missionVisionSection->mission_image);
            }

            $imagePath = $request->file('image')->store('mission-sections', 'public');
            $data['mission_image'] = $imagePath;

            // Log for debugging
            Log::info('Main image uploaded: ' . $imagePath);
        }
        // Handle icon 1 upload
        if ($request->hasFile('vision_image')) {
            if ($missionVisionSection->vision_image && Storage::disk('public')->exists($missionVisionSection->vision_image)) {
                Storage::disk('public')->delete($missionVisionSection->vision_image);
            }
            $data['vision_image'] = $request->file('vision_image')->store('vision_image', 'public');
        }

        $missionVisionSection->update($data);

        return back()->with('success', 'Mission vision section updated successfully!');
    }
}
