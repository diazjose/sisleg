<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = 'tramites';

    protected $fillable = [
        'denominacion',
    ];
/*
    public function config(){
    	return $this->hasMany('App\Config'); 
    }
  */  
    public function turnos(){
    	return $this->hasMany('App\Turno'); 
    }
}
