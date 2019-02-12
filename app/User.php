<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    
    protected $table = 'user';

    protected $fillable = [
        'name', 'email', 'password', 'id_Roles'
    ];

    public $timestamps = false;

    public function rol()
    {
    	return $this->belongsTo('App\Rol');
    }

    
}
