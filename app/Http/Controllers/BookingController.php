<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{

    public function index()
    {
        $leads = Booking::latest()->get();
        return view('backend.pages.admin-booking-leads', compact('leads'));
    }

    public function search()
    {
        return view('frontend.pages.booking');
    }
    public function booking(Request $request)
    {
        $category = RoomCategory::findOrFail($request->category);

        $checkIn = $request->check_in;
        $checkOut = $request->check_out;

        $days = 1;

        if ($checkIn && $checkOut) {
            $days = max(
                \Carbon\Carbon::parse($checkIn)
                    ->diffInDays($checkOut),
                1
            );
        }

        $price = $category->offer_price ?: $category->price;

        return view('frontend.pages.booking-form', [
            'category' => $category,
            'search' => [
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'adults' => $request->adults ?? 1,
                'children' => $request->children ?? 0,
            ],
            'days' => $days,
            'price' => $price,
            'total' => $days * $price,
        ]);
    }
    public function update(Request $request, Booking $lead)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after:check_in',
        'status' => 'required',
    ]);

    $lead->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'city' => $request->city,
        'check_in' => $request->check_in,
        'check_out' => $request->check_out,
        'adults' => $request->adults,
        'children' => $request->children,
        'status' => $request->status,
        'special_request' => $request->special_request,
    ]);

    return back()->with('success', 'Booking updated successfully.');
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
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'special_request' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {

            // Find Available Room
            $room = Room::where('category_id', $request->category_id)
                ->where('status', 'available')
                ->whereDoesntHave('bookings', function ($query) use ($request) {

                    $query->whereIn('status', ['pending', 'confirmed', 'checked_in'])
                        ->where(function ($q) use ($request) {

                            $q->where('check_in', '<', $request->check_out)
                                ->where('check_out', '>', $request->check_in);

                        });

                })->first();

            if (!$room) {

                DB::rollBack();

                return redirect()->route('booking-form', [
                    'category' => $request->category_id,
                    'check_in' => $request->check_in,
                    'check_out' => $request->check_out,
                    'adults' => $request->adults,
                    'children' => $request->children,
                ])->with('error', 'Sorry! No rooms are available for the selected dates.');
            }

            $category = RoomCategory::findOrFail($request->category_id);

            $days = \Carbon\Carbon::parse($request->check_in)
                ->diffInDays($request->check_out);

            $days = max($days, 1);

            $price = $category->offer_price ?: $category->price;

            $booking = Booking::create([
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
                'status' => 'pending',
            ]);

            DB::commit();

            return redirect()
                ->route('home')
                ->with('success', 'Booking submitted successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->route('booking-form', [
                'category' => $request->category_id,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'adults' => $request->adults,
                'children' => $request->children,
            ])->with('error', $e->getMessage());
        }
    }
    public function destroy(Booking $lead)
    {
        $lead->delete();
        return redirect()->back()->with('success', 'Lead deleted successfully!');
    }
}
