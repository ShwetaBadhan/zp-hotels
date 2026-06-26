<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    //
    protected $fillable = [
        'brand_name',
        'email',
        'phone',
        'address',
        'intro',
        'logo',
        'dark_logo',
        'is_active'

    ];
}
