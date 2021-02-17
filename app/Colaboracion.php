<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaboracion extends Model
{
    protected $table = 'colaboracion';

    protected $fillable = [
        'legajo_id', 'observacion', 'fecha',
    ];

    public function legajo(){
    	return $this->belongsTo('App\Legajo', 'legajo_id'); 
    }
}
