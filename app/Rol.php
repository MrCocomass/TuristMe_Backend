<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function user()
    {
    	return $this->hasMany('App\User');
    }
}
