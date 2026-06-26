<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialSettings;
class SocialSettingController extends Controller
{
    //
    public function update(Request $request)
    {
        $request->validate([
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        $social = SocialSettings::first();

        if (!$social) {
            $social = new SocialSettings();
        }

        $social->facebook_url = $request->facebook_url;
        $social->instagram_url = $request->instagram_url;
        $social->twitter_url = $request->twitter_url;
        $social->linkedin_url = $request->linkedin_url;

        $social->save();

        return back()->with('success', 'Social settings updated successfully.');
    }
}
