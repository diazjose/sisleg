<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turnos';

    protected $fillable = [
        'oficina_id','tramite_id','dni', 'fecha','hora','orden','estado'
    ];

    public function oficina(){
        return $this->belongsTo('App\Oficina', 'oficina_id'); 
    }

    public function tramite(){
        return $this->belongsTo('App\Tramite', 'tramite_id'); 
    } 
/*
    public function legajo(){
    	return $this->belongsTo('App\Legajo', 'legajo_id'); 
    }
    public function lugar(){
    	return $this->hasMany('App\Seguimiento')->orderBy('id', 'ASC'); 
    }
*/    
}
