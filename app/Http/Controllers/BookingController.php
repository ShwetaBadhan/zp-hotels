<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{
    public function search()
    {
        return view('frontend.pages.booking');
    }
    public function searchAvailability(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after_or_equal:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
        ]);
        $totalGuests = $request->adults + $request->children;
        $categories = RoomCategory::where('status', 'active')
            ->where('max_guests', '>=', $totalGuests)
            ->get();
        // dd($categories);
        $availableCategories = [];

        foreach ($categories as $category) {

            $room = Room::where('category_id', $category->id)
                ->where('status', 'available')
                ->first();
            // dd($room);
            if ($room) {
                $availableCategories[] = $category;
            }
        }
        return view('frontend.pages.booking', [
            'availableCategories' => $availableCategories,
            'search' => $request->all(),
        ]);


    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:room_categories,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:20',
            'city' => 'nullable|max:255',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after_or_equal:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'special_request' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {

            $room = Room::where('category_id', $request->category_id)
                ->where('status', 'available')
                ->whereDoesntHave('bookings', function ($query) use ($request) {

                    $query->whereIn('status', [
                        'pending',
                        'confirmed',
                        'checked_in'
                    ])->where(function ($q) use ($request) {

                        $q->whereBetween('check_in', [$request->check_in, $request->check_out])
                            ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                            ->orWhere(function ($q2) use ($request) {
                                $q2->where('check_in', '<=', $request->check_in)
                                    ->where('check_out', '>=', $request->check_out);
                            });

                    });

                })->first();

            if (!$room) {

                DB::rollBack();

                return response()->json([
                    'status' => false,
                    'message' => 'Sorry! No rooms are available for the selected dates.'
                ], 422);
            }

            $category = RoomCategory::findOrFail($request->category_id);

            $days = \Carbon\Carbon::parse($request->check_in)
                ->diffInDays($request->check_out);

            $price = $category->offer_price ?: $category->price;

            Booking::create([
                'room_id' => $room->id,
                'category_id' => $category->id,
                'booking_no' => 'BK' . now()->format('YmdHis') . rand(100, 999),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'city' => $request->city,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'adults' => $request->adults,
                'children' => $request->children,
                'price' => $price,
                'total_amount' => $days * $price,
                'special_request' => $request->special_request,
                'status' => 'pending'
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Booking submitted successfully.'
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
