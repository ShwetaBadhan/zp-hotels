<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'room_no',
        'floor',
        'status',
    ];

    /**
     * Get the category that owns the room.
     */
    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'category_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}