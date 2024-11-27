<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bonds extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'price',
        'slots',
        'status',
        'start_date',
        'withdraw_date',
        'booked_slots',
        'total_amount',
        'winner',
    ];

}
