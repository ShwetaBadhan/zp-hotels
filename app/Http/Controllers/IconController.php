<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use Illuminate\Http\Request;

class IconController extends Controller
{


    public function search(Request $request)
    {

        $icons = Icon::where('name', 'like', '%' . $request->q . '%')
            ->orWhere('class', 'like', "%{$request->q}%")
            ->limit(50)
            ->get();

        return response()->json($icons);
    }
}
