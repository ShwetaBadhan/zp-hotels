<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'category_id',
        'room_no',
        'floor',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'category_id');
    }
}