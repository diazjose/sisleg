<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persons';

    protected $fillable = [
        'name', 'surname', 'dni', 'email', 'phone', 'address','image',
    ];

    public function cargo(){
    	return $this->hasMany('App\Cargo'); 
    }

}
