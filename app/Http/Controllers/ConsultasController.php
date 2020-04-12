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
    			if ($mandato!='todos' AND $mandato!='') {
    				if ($mandato == 'Activo') {
    					$cv = Legajo::where('tipo',$tipo)->where('juridiccion',$juri)->where('zona',$zona)->join('cargos','cargos.legajo_id','=','legajos.id')->where('cargos.cargo','PRESIDENTE')->where('cargos.estado','Activo')->where('cargos.fecha_fin','>',date('Y-m-d'))->get();
    						//var_dump($cv);
    						//die();	
    				}else{
    					$cv = Legajo::where('tipo',$tipo)->where('juridiccion',$juri)->where('zona',$zona)->join('cargos','cargos.legajo_id','=','legajos.id')->where('cargos.cargo','PRESIDENTE')->where('cargos.estado','Activo')->where('cargos.fecha_fin','<',date('Y-m-d'))->get();
    				}
    				
    			}else{
    				$cv = Legajo::where('tipo',$tipo)->where('juridiccion',$juri)->where('zona',$zona)->get();
    			}
    		}else{
    			if ($mandato!='todos' AND $mandato!='') {
    				if ($mandato == 'Activo') {
    					$cv = Legajo::where('tipo',$tipo)->where('juridiccion',$juri)->join('cargos','cargos.legajo_id','=','legajos.id')->where('cargos.cargo','PRESIDENTE')->where('cargos.estado','Activo')->where('cargos.fecha_fin','>',date('Y-m-d'))->get();
    				}else{
    					$cv = Legajo::where('tipo',$tipo)->where('juridiccion',$juri)->join('cargos','cargos.legajo_id','=','legajos.id')->where('cargos.cargo','PRESIDENTE')->where('cargos.estado','Activo')->where('cargos.fecha_fin','<',date('Y-m-d'))->get();
    				}
    				
    			}else{
    				$cv = Legajo::where('tipo',$tipo)->where('juridiccion',$juri)->get();
    			}
    		}	
    	}else{
    		if ($zona!='todos' AND $zona!='') {
    			if ($mandato!='todos' AND $mandato!='') {
    				if ($mandato == 'Activo') {
    					$cv = Legajo::where('tipo',$tipo)->where('zona',$zona)->join('cargos','cargos.legajo_id','=','legajos.id')->where('cargos.cargo','PRESIDENTE')->where('cargos.estado','Activo')->where('cargos.fecha_fin','<',date('Y-m-d'))->get();
    				}else{
    					$cv = Legajo::where('tipo',$tipo)->where('zona',$zona)->join('cargos','cargos.legajo_id','=','legajos.id')->where('cargos.cargo','PRESIDENTE')->where('cargos.estado','Activo')->where('cargos.fecha_fin','<',date('Y-m-d'))->get();    					
    				}
    			}else{
    				$cv = Legajo::where('tipo',$tipo)->where('zona',$zona)->get();
    			}
    		}else{
    			if ($mandato!='todos' AND $mandato!='') {
    				if ($mandato == 'Activo') {
    					$cv = Legajo::where('tipo',$tipo)->join('cargos','cargos.legajo_id','=','legajos.id')->where('cargos.cargo','PRESIDENTE')->where('cargos.estado','Activo')->where('cargos.fecha_fin','>',date('Y-m-d'))->get();    	
    				}else{    					
    					$cv = Legajo::where('tipo',$tipo)->join('cargos','cargos.legajo_id','=','legajos.id')->where('cargos.cargo','PRESIDENTE')->where('cargos.estado','Activo')->where('cargos.fecha_fin','<',date('Y-m-d'))->get();   
    					var_dump($cv);
    					die(); 
    				}
    			}else{
    				$cv = Legajo::where('tipo',$tipo)->get();
    			}
    		}
    	}
    	return view('consultas.index', ['cv' => $cv, 'tipo' => $tipo, 'zona' => $zona, 'juridiccion' => $juri, 'estado' => $mandato]);
    }    

    public function search(Request $request){
    	var_dump($request->input('juridiccion'));
    	die();
    }
}
