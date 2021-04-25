<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Legajo;
use App\Expediente;
use App\Seguimiento;
use App\Caja;

class CajaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($d = ""){
        $fecha = date('Y-m-01');
        if($d!=""){
            $fecha = date("Y-m-d",strtotime($d));
        }
        $fechaNueva = date("Y-m-d",strtotime($fecha."+ 1 month"));
       
        $caja = Caja::where('created_at','>=', $fecha)
                      ->where('created_at','<', $fechaNueva)
                      ->get();
        $mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"][date("n",strtotime($fecha)) - 1];
        return view('caja.index',['caja' => $caja, 'mes' => $mes]);
       
 
    } 

    public function create(Request $request){
    	
    	$caja = new Caja;
        
    	$validate = $this->validate($request, [
                'formulario' => ['required', 'string','max:255'],
                'monto' => ['required', 'string','max:255'],
            ]);
        $caja->formulario = $request->input('formulario');
        $caja->monto = $request->input('monto');
        if (!empty($request->input('leg_id'))) {
            $caja->legajo_id = $request->input('leg_id'); 
        }
        if (!empty($request->input('observacion'))) {
            $caja->observacion = strtoupper($request->input('observacion')); 
        }
        if (!empty($request->input('entidad'))) {
            $caja->entidad = strtoupper($request->input('entidad')); 
        }
        
    	$caja->save();

        if (!empty($request->input('leg_id'))) {
            return redirect()->route('view_leg', [$request->input('leg_id')])
                         ->with(['message' => '¡¡ Compra de Formulario cargado correctamente !!', 'status' => 'success']); 
        }else{
            return redirect()->route('caja.index')
            ->with(['message' => '¡¡ Movimiento cargado correctamente !!', 'status' => 'success']);
        }
    }
}

