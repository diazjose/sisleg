<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Turno;

class TurnosController extends Controller
{
    public function index(){
        return view('turnos.index');
    }

    public function create(Request $request){
    	$fecha = $request->input('fecha');
    	$orden = Turno::where('fecha', $fecha)->get();
    	
    	$turno = new Turno;
        $validate = $this->validate($request, [
           'dni' => ['required', 'string','max:8'],
           'email' => ['required', 'string','max:255'],
           'fecha' => ['required', 'date'],
        ]);
        $turno->dni = $request->input('dni');
        $turno->email = $request->input('email');
        $turno->tipo = $request->input('tipo');
        $turno->fecha = $fecha;
        
        $or = count($orden) + 1;
		$turno->orden = $or;
        
        if (count($orden) == 0) {
			$date = date('Y-m-d H:i', strtotime($fecha));
			$date = strtotime('+8 hour', strtotime($date));
			$date = date('H:i', $date);
        }else{
        	$s = count($orden)*20;
        	$date = date('Y-m-d H:i', strtotime($fecha));
			$date = strtotime('+8 hour', strtotime($date));
			$date = date('H:i', $date);
			$date = strtotime("+$s minute", strtotime($date));
			$date = date('H:i', $date);
        }
        $turno->hora = $date;
        $turno->save();   	
    	
    	return response()->json($turno);
        //return view('turnos.index1', ['turno' => $turno]);
    	//return redirect()->route('home', [$turno->id])
        //                 ->with(['message' => 'Turno Solicitado con exito', 'status' => 'success']);
	}

	public function searchTurno(Request $request){

		$dni = $request->input('turnDni');
		$fecha = $request->input('turnFecha');

		if ($fecha > date('Y-m-d')) {
			$turno = Turno::where('dni',$dni)->where('fecha', $fecha)->get();
			if (count($turno)>0) {
				$dia = date('d/m/Y', strtotime($fecha));
				$message = "¡¡ Este DNI ya tiene un turno el dia $dia!!";	
			}else{
				$message = 1;
			}			
		}else{
			$message = "¡¡ Por favor ingrese una fecha posterior al dia de hoy !!";
		}
		return response()->json($message);
	}

    public function view(){
        $role = Auth::user()->role;

        $turnos = Turno::where('fecha',date('Y-m-d'))->get();
        return view('turnos.view',['turnos' => $turnos,'role' => $role]);
    }

    public function status(Request $request){

        $id = $request->input('turno');
        $status = $request->input('estado');
        
        $turno = Turno::find($id);
        $turno->estado = $status;
        $turno->save();
       
        return response()->json($turno);
    }

    public function buscar(){
        return view('turnos.search');
    }

    public function search(Request $request){
        $dni = $request->input('dni');
        
        $turno = Turno::where('dni',$dni)->where('fecha', date('Y-m-d'))->get();
        if (count($turno)>0) {
            return response()->json($turno);    
        }else{
            return response()->json(0);
        }
        
    }
}
