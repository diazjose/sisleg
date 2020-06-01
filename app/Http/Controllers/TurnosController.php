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

    public function registroCivil(){   
        return view('turnos.principal');   
    }

    public function create(Request $request){
    	    	
    	$turno = new Turno;
        $validate = $this->validate($request, [
           'dni' => ['required', 'string','max:8'],
           'lugar' => ['required', 'string'],
             'tipo' => ['required', 'string'],
        ]);
        /*
        switch ($request->input('lugar')) {
            case 'Casa Central(Av. Rivadavia N° 890)':
                
                break;
            case 'San Vicente(Barcelona N° 45)':
                # code...
                break;    
            case 'Santa Justina(Saenz Peña N° 1563)':
                # code...
                break;    
            default:
                # code...
                break;
        }

        $turno->dni = $request->input('dni');
        $turno->lugar = $request->input('lugar');
        $turno->tipo = $request->input('tipo');
        $turno->estado = "Espera";
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
        
        $date = date('d-m-Y');
        if(date('l', strtotime($date)) == 'Sunday' || date('l', strtotime($date)) == 'Saturday'){
            $fecha = 'Fin de Semana: '.$date;
        } else {
            $fecha = 'Semana: '.$date; 
        }        
        */
        return response()->json($turno);
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

        $turnos = Turno::where('fecha',date('Y-m-d'))->orderBy('orden')->get();
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

/*

create table oficinas(
id int(255) auto_increment not null,
denominacion varchar(255),
direccion varchar(255),
telefono varchar(100),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_oficinas PRIMARY KEY(id)    
)ENGINE=InnoDB;

create table tramites(
id int(255) auto_increment not null,
denominacion varchar(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_tramites PRIMARY KEY(id)    
)ENGINE=InnoDB;


create table config(
id int(255) auto_increment not null,
oficina_id int(255),
tramite_id int(255),
telefono varchar(100),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_config PRIMARY KEY(id),
CONSTRAINT fk_config_oficina FOREIGN KEY(oficina_id) REFERENCES oficinas(id),    
CONSTRAINT fk_config_tramite FOREIGN KEY(tramite_id) REFERENCES tramites(id)
)ENGINE=InnoDB;

create table turnos(
id int(255) auto_increment not null,
oficina_id int(255),
tramite_id int(255),
fecha date,
hora time,
estado varchar(100),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_turnos PRIMARY KEY(id),
CONSTRAINT fk_turnos_oficina FOREIGN KEY(oficina_id) REFERENCES oficinas(id),    
CONSTRAINT fk_turnos_tramite FOREIGN KEY(tramite_id) REFERENCES tramites(id)
)ENGINE=InnoDB;
*/