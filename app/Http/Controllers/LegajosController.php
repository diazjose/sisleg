<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Legajo;
use App\Cargo;
use App\Persona;


class LegajosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('legajos.index');
    }

    public function new(){
    	return view('legajos.new');
    }

    public function view($id){
        $legajo = Legajo::find($id);
        return view('legajos.view', ['legajo' => $legajo]);
    }

    public function create(Request $request){
    	
    	$legajo = new Legajo;

    	$validate = $this->validate($request, [
                'numero' => ['required', 'string','max:255', 'unique:legajos'],
                'denominacion' => ['required', 'string','max:255', 'unique:legajos'],
                'juridiccion' => ['required', 'string','max:255'],
                'direccion' => ['required', 'string','max:255'],
                'resolucion' => ['required', 'string','max:255'],

            ],
            [
            	'numero.unique' => 'El N° Legajo ya existe en la Base de Datos',
            	'denominacion.unique' => 'Ya existe un Legajo con esta Denominacion',
            	'juridiccion.required' => 'Elegir Juridiccion',
            ]);

    	$legajo->numero = $request->input('numero');
    	$legajo->tipo = $request->input('tipo');
    	$legajo->denominacion = strtoupper($request->input('denominacion'));
    	$legajo->juridiccion = $request->input('juridiccion');
    	$legajo->direccion = strtoupper($request->input('direccion'));
        if (!empty($request->input('ubicacion'))) {
            $legajo->ubicacion = $request->input('ubicacion'); 
        }else{
            $legajo->ubicacion = "";
        }        
        $legajo->zona = $request->input('zona');
    	$legajo->resolucion = $request->input('resolucion');
    	$legajo->fecha_inicio = $request->input('fecha_inicio');
        if (!empty($request->input('punto_cero'))) {
            $legajo->punto_cero = $request->input('punto_cero'); 
        }

    	$legajo->save();

        return view('legajos.view', ['legajo' => $legajo]);/*
    	return redirect()->route('view_leg', [''])
                         ->with(['message' => 'Legajo cargado correctamente', 'status' => 'success']);
*/
    }

    public function update(Request $request){
        
        $id = $request->input('id');
        $legajo = Legajo::find($id);        
        
        $validate = $this->validate($request, [
                'numero' => ['required', 'string','max:255', 'unique:legajos,numero,'.$id],
                'denominacion' => ['required', 'string','max:255', 'unique:legajos,denominacion,'.$id],
                'juridiccion' => ['required', 'string','max:255'],
                'direccion' => ['required', 'string','max:255'],
                'resolucion' => ['required', 'string','max:255'],

            ],
            [
                'numero.unique' => 'El N° Legajo ya existe en la Base de Datos',
                'denominacion.unique' => 'Ya existe un Legajo con esta Denominacion',
            ]);
        
        $legajo->numero = $request->input('numero');
        $legajo->tipo = $request->input('tipo');
        $legajo->denominacion = strtoupper($request->input('denominacion'));
        $legajo->juridiccion = $request->input('juridiccion');
        $legajo->direccion = strtoupper($request->input('direccion'));
        $legajo->zona = $request->input('zona');
        if (!empty($request->input('ubicacion'))) {
            $legajo->ubicacion = $request->input('ubicacion'); 
        }
        $legajo->resolucion = $request->input('resolucion');
        $legajo->fecha_inicio = $request->input('fecha_inicio');
        if (!empty($request->input('punto_cero'))) {
            $legajo->punto_cero = $request->input('punto_cero'); 
        }
        $legajo->update();
        
        return view('legajos.view', ['legajo' => $legajo]);
        /*
         ('', ['legajo' => $legajo])
                         ->with(['message' => 'Legajo Actualizado correctamente', 'status' => 'success']);
    */
    }

    public function search(Request $request){
        $buscar = $request->input('buscar');
        
        if ($buscar == '') {
            $html = '';
        }else{
            $legajos = Legajo::where('numero','LIKE', '%'.$buscar.'%')
                                ->orWhere('denominacion','LIKE', '%'.$buscar.'%')
                                ->orWhere('tipo','LIKE', '%'.$buscar.'%')
                                ->orWhere('juridiccion','LIKE', '%'.$buscar.'%')
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
            
            $html = '';
            foreach ($legajos as $legajo) {
                $html.= '<tr id="$Legajo->id">'; 
                    $html .= '<td class="numero">'.$legajo->numero.'</td>';
                    $html .= '<td class="tipo">'.$legajo->tipo.'</td>';
                    $html .= '<td class="denominacion">'.$legajo->denominacion.'</td>';
                    $html .= '<td class="juridiccion">'.$legajo->juridiccion.'</td>';
                    $html .= '<td class="resolucion">'.$legajo->resolucion.'</td>';
                    $html .= '<td><a href="'.route('view_leg',[$legajo->id]).'" onclick="edit('.$legajo->id.')" class="btn btn-outline-primary"><i class="far fa-eye"></i></a></td>';
                $html .= '</tr>';    
            }    
        }
            
        return response()->json($html); 
    }
}

/* 
------ DATABASE ------

create table users(
id int(255) auto_increment not null,
name varchar(255),
surname varchar(255),
email varchar(255),
password varchar(255),
role varchar(255),
created_at datetime,
updated_at datetime,
remember_token varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)    
)ENGINE=InnoDB;

create table legajos(
id int(255) auto_increment not null,
numero varchar(255),
denominacion varchar(255),
juridiccion varchar(255),
direccion text,
zona varchar(50),
resolucion varchar(255),
fecha_inicio date,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_legajos PRIMARY KEY(id)    
)ENGINE=InnoDB;

create table asambleas(
id int(255) auto_increment not null,
legajo_id int(255),
fecha date,
documentacion varchar(10),
observacion text,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_asambleas PRIMARY KEY(id),    
CONSTRAINT fk_asambleas_legajo FOREIGN KEY(legajo_id) REFERENCES legajos(id)
)ENGINE=InnoDB;



create table expedientes(
id int(255) auto_increment not null,
legajo_id int(255),
numero varchar(255),
denominacion varchar(255),
iniciador varchar(255),
asunto varchar(255),
observacion text,
archivado varchar(10),
fojas int(100),
fecha_fin date,
resolucion varchar(255),
formulario varchar(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_expedientes PRIMARY KEY(id)    
)ENGINE=InnoDB;

create table persons(
id int(255) auto_increment not null,
name varchar(255),
surname varchar(255),
dni varchar(12),
email varchar(255),
address text,
phone varchar(100),
image varchar(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_persons PRIMARY KEY(id)    
)ENGINE=InnoDB;

create table cargos(
id int(255) auto_increment not null,
legajo_id int(255),
person_id int(255),
cargo varchar(100),
fecha_inicio date,
fecha_fin date,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_cargos PRIMARY KEY(id),
CONSTRAINT fk_cargos_legajo FOREIGN KEY(legajo_id) REFERENCES legajos(id),    
CONSTRAINT fk_cargos_person FOREIGN KEY(person_id) REFERENCES persons(id)
)ENGINE=InnoDB;

create table seguimiento(
id int(255) auto_increment not null,
expediente_id int(255),
lugar varchar(100),
observacion text,
estado varchar(20),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_seguimiento PRIMARY KEY(id),
CONSTRAINT fk_seguimiento_expediente FOREIGN KEY(expediente_id) REFERENCES expedientes(id)
)ENGINE=InnoDB;

create table colaboracion(
id int(255) auto_increment not null,
legajo_id int(255),
observacion text,
fecha date,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_colaboracion PRIMARY KEY(id),
CONSTRAINT fk_colaboracion_legajo FOREIGN KEY(legajo_id) REFERENCES legajos(id)
)ENGINE=InnoDB;

*/