<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialFeed extends Model
{
    protected $fillable = [
        'facebook_page',
        'instagram_embed',
        'linkedin_embed',
        'is_active',
    ];
}
