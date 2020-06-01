<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = 'oficinas';

    protected $fillable = [
        'denominacion', 'direccion', 'telefono',
    ];

    public function config(){
    	return $this->hasMany('App\Config'); 
    }
}
