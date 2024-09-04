<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resources';

    protected $fillable = [
        'id',
        'title',
        'description',
        'type',
        'validation_statut',
        'creation_date',
        'content',
        'etat',
        'user_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'type' => 'string',
        'validation_statut' => 'string',
        'creation_date' => 'datetime',
        'content' => 'string',
        'etat' => 'string',
        'user_id' => 'integer'
    ];
}


?>