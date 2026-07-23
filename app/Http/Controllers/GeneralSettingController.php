<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\SocialFeed;
use App\Models\SocialSettings;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class GeneralSettingController extends Controller
{
    //
    public function index()
    {
        $generalSetting = GeneralSetting::firstOrCreate(
            [],
            [
                'brand_name' => 'Zp Grand Hotel',
                'address' => 'Mohali , Punjab',
                'phone' => '+91 00000 00000',
                'email' => 'info@gmail.com',
                'intro' => 'Our hotel seamlessly blends timeless charm with modern amenities, offering an unparalleled experience for discerning travelers.',
                'is_active' => true
            ]
        );
        $socialSetting = SocialSettings::firstOrCreate(
            [],
            [
                'facebook_url' => 'https://www.facebook.com/',
                'instagram_url' => 'https://www.instagram.com/',
                'twitter_url' => 'https://x.com/',
                'linkedin_url' => 'https://www.linkedin.com/',
                'is_active' => true,
            ]
        );
        $socialFeed = SocialFeed::firstOrCreate(
            [],
            [
                'facebook_page' => 'https://www.facebook.com/',
                'instagram_url' => 'instagram_embed',
                'is_active' => true,
            ]
        );

        return view('backend.pages.admin-general-settings', compact('generalSetting','socialSetting','socialFeed'));
    }

    public function update(Request $request)
    {
        $generalSetting = GeneralSetting::firstOrFail();

        $request->validate([
            'brand_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'intro' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'dark_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only([
            'brand_name',
            'address',
            'phone',
            'email',
            'intro',
        ]);

        $data['is_active'] = $request->has('is_active');

        // Upload Logo
        if ($request->hasFile('logo')) {

            if (
                $generalSetting->logo &&
                Storage::disk('public')->exists($generalSetting->logo)
            ) {
                Storage::disk('public')->delete($generalSetting->logo);
            }

            $data['logo'] = $request->file('logo')->store('general-settings', 'public');

            Log::info('Logo uploaded: ' . $data['logo']);
        }

        // Upload Dark Logo
        if ($request->hasFile('dark_logo')) {

            if (
                $generalSetting->dark_logo &&
                Storage::disk('public')->exists($generalSetting->dark_logo)
            ) {
                Storage::disk('public')->delete($generalSetting->dark_logo);
            }

            $data['dark_logo'] = $request->file('dark_logo')->store('general-settings', 'public');

            Log::info('Dark Logo uploaded: ' . $data['dark_logo']);
        }

        $generalSetting->update($data);

        return redirect()->back()->with('success', 'General settings updated successfully.');
    }
}
