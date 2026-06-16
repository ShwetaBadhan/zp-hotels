<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionVision extends Model
{
    //
    use HasFactory;

    protected $fillable = [

        'main_title',
        'sub_title',
        'mission_main_title',
        'vision_main_title',
        'mission_sub_title',
        'vision_sub_title',
        'mission',
        'vision',
        'mission_image',
        'vision_image',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
