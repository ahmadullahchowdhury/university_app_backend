<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'date_of_birth',
        'interest_area',
        'marketing_updates',
        'correspondence_in_welsh',
        'gps_location'
    ];
}
