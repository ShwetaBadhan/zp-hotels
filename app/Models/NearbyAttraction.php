<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NearbyAttraction extends Model
{
    protected $fillable = [
       'title',
       'sub_title',
       'description',
       'image',
       'status'
    ];
}
