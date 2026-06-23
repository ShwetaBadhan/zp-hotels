<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'offer_price',
        'max_guests',
        'bedrooms',
        'bathrooms',
        'size_sqft',
        'description',
        'thumbnail',
        'images',
        'amenities',
        'status'
    ];

    protected $casts = [
        'images' => 'array',
        'amenities' => 'array',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'category_id');
    }
}