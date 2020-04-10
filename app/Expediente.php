<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table = 'expedientes';

    protected $fillable = [
        'legajo_id', 'numero', 'denominacion', 'iniciador', 'asunto', 'observacion', 'archvado', 'fojas', 'formulario_id', 'fecha_fin', 'resolucion',
    ];

    public function legajo(){
    	return $this->belongsTo('App\Legajo', 'legajo_id'); 
    }
    public function lugar(){
    	return $this->hasMany('App\Seguimiento')->orderBy('id', 'ASC'); 
    }
}

