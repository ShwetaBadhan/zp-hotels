<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EventAboutSection extends Model
{
    //
    use HasFactory;

    protected $fillable = [

        'main_title',
        'sub_title',
        'description_1',
        'description_2',
        'image',
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
