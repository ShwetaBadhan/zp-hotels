<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactLead extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'phone',
        'enquiry_for',
        'check_in',
        'check_out',
        'message'
    ];
}
