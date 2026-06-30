<?php

namespace App\Http\Controllers;

use App\Models\TermsConditions;
use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
    public function index()
    {
        $aboutSection = TermsConditions::firstOrCreate(
            [],
            [
                'sub_title' => 'Terms and Conditions',
                'main_title' => 'Terms Conditions',
                'description_1' => 'Nestled in the heart of Delhi, Royalx stands as a beacon of elegance and sophistication. Our hotel seamlessly blends timeless charm with modern amenities, offering an unparalleled experience for discerning travelers.',
                'is_active' => true
            ]
        );

        return view('backend.pages.admin-terms-conditions', compact('aboutSection'));
    }

    public function update(Request $request)
    {
        $aboutSection = TermsConditions::firstOrFail();

        $request->validate([

            'sub_title' => 'required|string|max:200',
            'main_title' => 'required|string|max:200',
            'description_1' => 'required|string',
            'is_active' => 'boolean'
        ]);

        $data = $request->only([

            'sub_title',
            'main_title',
            'description_1',
            'is_active'
        ]);




        $aboutSection->update($data);

        return back()->with('success', 'Terms Conditions updated successfully!');
    }
}
