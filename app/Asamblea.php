<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asamblea extends Model
{
    protected $table = 'asambleas';

    protected $fillable = [
        'legajo_id', 'fecha', 'documentacion', 'observacion',
    ];

    public function legajo(){
    	return $this->belongsTo('App\Legajo', 'legajo_id'); 
    }
}
