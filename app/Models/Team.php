<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = [
        'name',
        'designation',
        'facebook_url',
        'instagram_url',
        'status',
        'image'

    ];
}
