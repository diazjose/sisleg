<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turnos';

    protected $fillable = [
        'dni', 'email', 'fecha', 'orden',
    ];

/*
    public function legajo(){
    	return $this->belongsTo('App\Legajo', 'legajo_id'); 
    }
    public function lugar(){
    	return $this->hasMany('App\Seguimiento')->orderBy('id', 'ASC'); 
    }
*/    
}
