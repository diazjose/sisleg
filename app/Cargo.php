<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';

    protected $fillable = [
        'legajo_id', 'person_id', 'cargo', 'fecha_inicio', 'fecha_fin',
    ];

    public function legajo(){
    	return $this->belongsTo('App\Legajo', 'legajo_id'); 
    }

    public function persona(){
    	return $this->belongsTo('App\Persona', 'person_id'); 
    }
}
