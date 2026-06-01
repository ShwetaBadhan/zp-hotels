<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomCategory extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'status', 'sort_order'
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'category_id');
    }

    public function getActiveRoomsCount()
    {
        return $this->rooms()->where('status', 'active')->count();
    }
}