<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialSettings extends Model
{
    //
    protected $fillable = [
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'is_active'
    ];
}
