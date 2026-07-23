<?php

namespace App\Http\Controllers;

use App\Models\SocialFeed;
use Illuminate\Http\Request;

class SocialFeedController extends Controller
{
    public function index()
    {
        $socialFeed = SocialFeed::firstOrCreate(
            [],
            [
                'facebook_page' => null,
                'instagram_embed' => null,
                'linkedin_embed' => null,
                'is_active' => true
            ]
        );

        return view('admin.views.admin-general-settings', compact('socialFeed'));
    }

    public function update(Request $request)
    {
        $socialFeed = SocialFeed::firstOrFail();

        $request->validate([
            'facebook_page' => 'nullable|string|max:200',
            'instagram_embed' => 'nullable|string',
            'linkedin_embed' => 'nullable|string',
            'is_active' => 'nullable|boolean'
        ]);

        //  Normal fields
        $data = $request->only([
            'facebook_page',
            'instagram_embed',
            'linkedin_embed',
            'is_active'
        ]);

        $data['is_active'] = 1;

        //  Update data
        $socialFeed->update($data);

        return back()->with('success', 'Social feed updated successfully!');
    }
}

