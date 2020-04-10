<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Legajo;
use App\Expediente;
use App\Seguimiento;


class ConsultasController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($tipo){
    	$cv = Legajo::where('tipo',$tipo)->get();
    	return view('consultas.index', ['cv' => $cv, 'tipo' => $tipo]);
    }    
}
