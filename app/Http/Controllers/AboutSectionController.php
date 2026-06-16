<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutSection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AboutSectionController extends Controller
{
    //
    public function index()
    {
        $aboutSection = AboutSection::firstOrCreate(
            [],
            [
                'sub_title' => 'Zp Grand Hotel',
                'main_title' => 'Where Elegance Meets Excellence',
                'description_1' => 'Nestled in the heart of Delhi, Royalx stands as a beacon of elegance and sophistication. Our hotel seamlessly blends timeless charm with modern amenities, offering an unparalleled experience for discerning travelers.',
                'description_2' => 'Our hotel seamlessly blends timeless charm with modern amenities, offering an unparalleled experience for discerning travelers.',
                'is_active' => true
            ]
        );

        return view('backend.pages.admin-about-section', compact('aboutSection'));
    }

    public function update(Request $request)
    {
        $aboutSection = AboutSection::firstOrFail();

        $request->validate([

            'sub_title' => 'required|string|max:200',
            'main_title' => 'required|string|max:200',
            'description_1' => 'required|string',
            'description_2' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean'
        ]);

        $data = $request->only([

            'sub_title',
            'main_title',
            'description_1',
            'description_2',
            'is_active'
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutSection->image && Storage::disk('public')->exists($aboutSection->image)) {
                Storage::disk('public')->delete($aboutSection->image);
            }

            $imagePath = $request->file('image')->store('about-sections', 'public');
            $data['image'] = $imagePath;

            // Log for debugging
            Log::info('Main image uploaded: ' . $imagePath);
        }


        $aboutSection->update($data);

        return back()->with('success', 'About section updated successfully!');
    }
}
