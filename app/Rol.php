<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable = ['id', 'rol'];

    public function users(){
        $this->hasMany('App\User');
    }
}