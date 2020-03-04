<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'seguimiento';

    protected $fillable = [
        'expediente_id', 'lugar', 'observacion', 'estado',
    ];
    public function expediente(){
    	return $this->belongsTo('App\Legajo', 'expediente_id'); 
    }
}
