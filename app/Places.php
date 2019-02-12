<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    protected $table = 'places';

    protected $fillable = [
        'name', 'description', 'coordenate_x', 'coordenate_y', 'date_start', 'date_end'
    ];

    public $timestamps = false;

}
