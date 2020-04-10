<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
	protected $table = 'formularios';

    protected $fillable = [
        'tipo', 'numero', 'valor',
    ];
}
