<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'category_id',
        'booking_no',
        'name',
        'email',
        'phone',
        'city',
        'check_in',
        'check_out',
        'adults',
        'children',
        'price',
        'total_amount',
        'special_request',
        'status',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'category_id');
    }
}
