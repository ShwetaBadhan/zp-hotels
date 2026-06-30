<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\ContactLead;
use App\Models\Team;
use App\Models\Room;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $totalBookings = Booking::count();

        $totalRevenue = Booking::where('status', 'confirmed')->sum('total_amount');

        $totalRooms = Room::count();

        $availableRooms = Room::where('status', 'available')->count(); // if status column exists

        $totalTeams = Team::count();

        $contactLeads = ContactLead::latest()->take(10)->get();
        $bookingLeads = Booking::latest()->take(10)->get();

        return view('backend.pages.dashboard', compact(
            'totalUsers',
            'totalBookings',
            'totalRevenue',
            'totalRooms',
            'availableRooms',
            'totalTeams',
            'contactLeads',
            'bookingLeads'
        ));
    }
}