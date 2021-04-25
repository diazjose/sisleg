<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $table = 'caja';

    protected $fillable = [
        'legajo_id', 'entidad', 'formulario', 'monto', 'fecha', 'observacion',
    ];

    public function legajo(){
    	return $this->belongsTo('App\Legajo', 'legajo_id'); 
    }
}
