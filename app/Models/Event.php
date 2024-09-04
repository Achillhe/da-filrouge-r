<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'city',
        'zipcode',
        'location',
        'type',
        'geo_location',
        'capacity',
        'registration_required',
        'description',
        'web_site',
    ];

    protected $casts = [
        'title' => 'string',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'city' => 'string',
        'zipcode' => 'string',
        'location' => 'string',
        'type' => 'string',
        'geo_location' => 'string',
        'capacity' => 'integer',
        'registration_required' => 'boolean',
        'description' => 'string',
        'web_site' => 'string',
    ];
}
