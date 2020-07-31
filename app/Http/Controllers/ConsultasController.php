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

    public function index($tipo, $juri='',$zona='',$mandato=''){
        if ($juri!='todos' AND $juri!='') {
            if ($zona!='todos' AND $zona!='') {
                $cv = Legajo::where('tipo',$tipo)->where('juridiccion',$juri)->where('zona',$zona)->get();
            }else{
                $cv = Legajo::where('tipo',$tipo)->where('juridiccion',$juri)->get();
            }   
        }else{
            if ($zona!='todos' AND $zona!='') {
                $cv = Legajo::where('tipo',$tipo)->where('zona',$zona)->get();
            }else{
                $cv = Legajo::where('tipo',$tipo)->get();
            }
        }
        return view('consultas.index', ['cv' => $cv, 'tipo' => $tipo, 'zona' => $zona, 'juridiccion' => $juri, 'estado' => $mandato]);
    }    

    public function search(Request $request){
    	var_dump($request->input('juridiccion'));
    	die();
    }
}
