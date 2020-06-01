<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';

    protected $fillable = [
        'oficina_id', 'tramite_id', 'hora_inicio', 'hora_fin', 'min_turno'
    ];

    public function oficina(){
    	return $this->belongsTo('App\Oficina', 'oficina_id'); 
    }

    public function tramite(){
    	return $this->belongsTo('App\Tramite', 'tramite_id'); 
    }
}
