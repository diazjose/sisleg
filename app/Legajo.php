<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legajo extends Model
{
    protected $table = 'legajos';

    protected $fillable = [
        'numero', 'tipo', 'denominacion', 'juridiccion', 'resolucion', 'fecha_inicio',
    ];

    public function cargos(){
    	return $this->hasMany('App\Cargo'); 
    }

    public function cargoActivos(){
        return $this->hasMany('App\Cargo')->where('estado','Activo'); 
    }

    public function expedientes(){
    	return $this->hasMany('App\Expediente')->orderBy('id', 'DESC');	
    }

}


