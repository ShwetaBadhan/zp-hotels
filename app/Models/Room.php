<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Room extends Model
{
    protected $fillable = [
        'name', 'slug', 'category_id', 'description', 'short_description',
        'price', 'offer_price', 'max_guests', 'bedrooms', 'bathrooms',
        'size_sqft', 'thumbnail', 'images', 'amenities', 'status', 'featured', 'sort_order'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'offer_price' => 'decimal:2',
        'images' => 'array',
        'amenities' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class, 'category_id');
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? asset('storage/' . $this->thumbnail) : asset('backend/assets/img/placeholder-room.jpg');
    }

    public function getImagesUrlAttribute()
    {
        return collect($this->images ?? [])->map(fn($img) => asset('storage/' . $img));
    }

    public function getDiscountPercentAttribute()
    {
        if ($this->offer_price && $this->price > $this->offer_price) {
            return round((($this->price - $this->offer_price) / $this->price) * 100);
        }
        return 0;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', 'yes');
    }
}