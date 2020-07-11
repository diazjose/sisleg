<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Turno;
use App\Oficina;
use App\Config;
use App\Tramite;

class TurnosController extends Controller
{
    public function index(){
        //$oficinas = Oficina::orderBy('denominacion')->get();
        $tramites = Tramite::orderBy('denominacion')->get();
        return view('turnos.index',['tramites' => $tramites]);
    }

    public function registroCivil(){   
        return view('turnos.principal');   
    }

    public function created(Request $request){
    	    	
    	$validate = $this->validate($request, [
           'dni' => ['required', 'string','max:8'],
           'tramite' => ['required', 'int', 'max:255'],
        ]);
        $dni = $request->input('dni');
        $tramite = $request->input('tramite');
        $date = date('Y-m-d');
        
        $turno = Turno::where('dni',$dni)->where('fecha','>', $date)->where('estado', 'Espera')->first();        
        $confs = Config::where('tramite_id', $tramite)->get();
        $count = count($confs);

        if ($turno) {
            $info[0] = $turno;
            $info[1] = $turno->oficina->denominacion;
            $info[2] = $turno->tramite->denominacion;
            $info[3] = 'Usted ya tiene un turno';
            $info[4] = 'dark';
        }else{
            if ($confs) {
                $turno = new Turno;
                $turno->tramite_id = $tramite;
                $turno->dni = $dni;
                $turno->estado = 'Espera';
                $bandera = 0;
                for ($i=0; $i < $count ; $i++) { 
                    $tur = Turno::where('oficina_id',$confs[$i]->oficina_id)->where('tramite_id',$tramite)->orderBy('id','desc')->first();
                    if ($tur) {
                        $horac = strtotime($confs[$i]->hora_fin);
                        $min_turno = $confs[$i]->min_turno;
                        $hora = strtotime("+$min_turno minute", strtotime($tur->hora));
                        if ($hora < $horac) {
                            $turno->oficina_id = $confs[$i]->oficina_id;
                            $turno->fecha = $tur->fecha;
                            $hora = strtotime("+$min_turno minute", strtotime($tur->hora));
                            $hora = date('H:i', $hora);
                            $turno->hora = $hora;
                            $turno->orden = $tur->orden + 1;
                            break;
                        }else{
                            $u = $i;
                           $count1 = $count-1;
                           if ($u == $count1) {
                                $date = date('d-m-Y', strtotime($tur->fecha."+ 1 days"));
                                if(date('l', strtotime($date)) == 'Sunday' || date('l', strtotime($date)) == 'Saturday'){
                                    $date = date('d-m-Y', strtotime($tur->fecha."+ 3 days"));
                                }
                                $turno->oficina_id = $confs[0]->oficina_id;
                                $fecha = date('Y-m-d', strtotime($date));
                                $turno->fecha = $fecha;
                                $turno->orden = 1;
                                $turno->hora = $confs[0]->hora_inicio;     
                           }     
                        }
                    }else{
                        if ($i == 0) {
                            $date = date('Y-m-d');
                            $date = date('d-m-Y', strtotime($date."+ 1 days"));
                            if(date('l', strtotime($date)) == 'Sunday' || date('l', strtotime($date)) == 'Saturday'){
                                    $date = date('d-m-Y', strtotime($date."+ 3 days"));
                            }
                            $turno->oficina_id = $confs[$i]->oficina_id;
                            $fecha = date('Y-m-d', strtotime($date));
                            $turno->fecha = $fecha;
                            $turno->orden = 1;
                            $turno->hora = $confs[$i]->hora_inicio;
                            break;
                        }else{
                            $e = $i-1;
                            $tur = Turno::where('oficina_id',$confs[$e]->oficina_id)->where('tramite_id',$tramite)->orderBy('id','desc')->first();
                            $turno->oficina_id = $confs[$i]->oficina_id;
                            $turno->fecha = $tur->fecha;
                            $turno->orden = 1;
                            $turno->hora = $confs[$i]->hora_inicio;
                            break;
                        }
                        
                    }     
                }              
            }
            $info[0] = $turno;
            $info[1] = $turno->oficina->denominacion;
            $info[2] = $turno->tramite->denominacion;
            $info[3] = 'Solicitud de turno confirmada';
            $info[4] = 'success';
            $turno->save();
        }
        return response()->json($info);
        
    }

    public function create(Request $request){
                
        $validate = $this->validate($request, [
           'dni' => ['required', 'string','max:8'],
           'oficina' => ['required', 'int', 'max:255'],
           'tramite' => ['required', 'int', 'max:255'],
        ]);
        $dni = $request->input('dni');
        $date = date('Y-m-d');
        $turno = Turno::where('dni',$dni)->where('fecha','>', $date)->where('estado', 'Espera')->first();
        
        if ($turno) {
            $info[0] = $turno;
            $info[1] = $turno->oficina->denominacion;
            $info[2] = $turno->tramite->denominacion;
            $info[3] = 'Usted ya tiene un turno';
            $info[4] = 'dark';
        }else{
            $oficina = $request->input('oficina');
            $tramite = $request->input('tramite');
            $tur = Turno::where('oficina_id',$oficina)->where('tramite_id',$tramite)->orderBy('id','desc')->first();
            $conf = Config::where('oficina_id',$oficina)->where('tramite_id', $tramite)->first();
            
            $turno = new Turno;
            $turno->oficina_id = $oficina;
            $turno->tramite_id = $tramite;
            $turno->dni = $request->input('dni');
            $turno->estado = 'Espera';

            if ($tur) {
                $horat = strtotime($tur->hora);
                $horac = strtotime($conf->hora_fin);
                $hora = strtotime("+$conf->min_turno minute", strtotime($tur->hora));
                if ($horat < $horac AND $hora < $horac) {
                    $turno->fecha = $tur->fecha;
                    $hora = strtotime("+$conf->min_turno minute", strtotime($tur->hora));
                    $hora = date('H:i', $hora);
                    $turno->hora = $hora;
                    $turno->orden = $tur->orden + 1;
                }else{
                    $date = date('d-m-Y', strtotime($tur->fecha."+ 1 days"));
                    if(date('l', strtotime($date)) == 'Sunday' || date('l', strtotime($date)) == 'Saturday'){
                        $date = date('d-m-Y', strtotime($tur->fecha."+ 3 days"));
                    }
                    $fecha = date('Y-m-d', strtotime($date));
                    $turno->fecha = $fecha;
                    $turno->orden = 1;
                    $turno->hora = $conf->hora_inicio;
                }

            }else{
                $date = date('Y-m-d');
                $date = date('d-m-Y', strtotime($date."+ 1 days"));
                if(date('l', strtotime($date)) == 'Sunday' || date('l', strtotime($date)) == 'Saturday'){
                        $date = date('d-m-Y', strtotime($tur->fecha."+ 3 days"));
                }
                $fecha = date('Y-m-d', strtotime($date));
                $turno->fecha = $fecha;
                $turno->orden = 1;
                $turno->hora = $conf->hora_inicio;
            }
            $info[0] = $turno;
            $info[1] = $turno->oficina->denominacion;
            $info[2] = $turno->tramite->denominacion;
            $info[3] = 'Solicitud de turno confirmada';
            $info[4] = 'success';
            $turno->save();    
        }

        return response()->json($info);
    }    

	public function searchTurno(Request $request){

		$dni = $request->input('dni');
        $date = date('Y-m-d');

		$turno = Turno::where('dni',$dni)->where('fecha','>', $date)->where('estado', 'Espera')->first();
		
        if ($turno) {
            $message = 1;
        }else{
            $message = 0;
        }

		return response()->json($message);
	}

    public function view($fecha=''){
        //$role = Auth::user()->role;
        $ofi = Oficina::all();
        
        foreach ($ofi as $o) {
            if ($fecha != '') {
                $turnos["$o->denominacion"] = Turno::where('fecha',$fecha)
                                                    ->where('oficina_id', $o->id)
                                                    //->orderBy('orden')
                                                    ->orderBy('tramite_id')
                                                    ->get();
            }else{
                $turnos["$o->denominacion"] = Turno::where('fecha',date('Y-m-d'))
                                                    ->where('oficina_id', $o->id)
                                                    //->orderBy('orden')
                                                    ->orderBy('tramite_id')
                                                    ->get();    
            }
        }
        //var_dump($turnos['CASA CENTRAL']);
        //die();
        //return view('turnos.view',['turnos' => $turnos,'role' => $role]);
        return view('turnos.view',['fecha' => $fecha,'turnos' => $turnos, 'oficina' => $ofi]);
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
        
        $turno = Turno::where('dni',$dni)->where('fecha', date('Y-m-d'))->first();
        if ($turno) {
            $info[0] = $turno;
            $info[1] = $turno->oficina->denominacion;
            $info[2] = $turno->tramite->denominacion;
            return response()->json($info);    
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
hora_inicio time,
hora_fin time,
min_turno int(10),
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
dni varchar(10),
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