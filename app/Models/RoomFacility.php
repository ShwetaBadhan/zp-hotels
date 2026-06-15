<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomFacility extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'list',
    ];

    protected $casts = [
        'list' => 'array',
    ];
}