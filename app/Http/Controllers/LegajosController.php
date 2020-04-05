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
    	$legajo->resolucion = $request->input('resolucion');
    	$legajo->fecha_inicio = $request->input('fecha_inicio');

    	$legajo->save();

    	return redirect()->route('new_legajo')
                         ->with(['message' => 'Legajo cargado correctamente', 'status' => 'success']);

    }

    public function update(Request $request){
        
        $id = $request->input('id');
        $legajo = Legajo::find($id);        
        /*
        var_dump($request->input('id')."<br>");
        var_dump($request->input('numero')."<br>");
        var_dump($request->input('tipo')."<br>");
        var_dump($request->input('denominacion')."<br>");
        var_dump($request->input('juridiccion')."<br>");
        var_dump($request->input('direccion')."<br>");
        var_dump($request->input('resolucion')."<br>");
        var_dump($request->input('fecha_inicio')."<hr>");
        */
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
        $legajo->resolucion = $request->input('resolucion');
        $legajo->fecha_inicio = $request->input('fecha_inicio');
        /*
        var_dump($legajo->numero."<br>");
        var_dump($legajo->tipo."<br>");
        var_dump($legajo->denominacion."<br>");
        var_dump($legajo->juridiccion."<br>");
        var_dump($legajo->direccion."<br>");
        var_dump($legajo->resolucion."<br>");
        var_dump($legajo->fecha_inicio."<br>");
        die();*/
        $legajo->update();
        return view('legajos.view', ['legajo' => $legajo]);
        /*
        return redirect()->route('', ['legajo' => $legajo])
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
                    $html .= '<td><a href="'.route('view_leg',[$legajo->id]).'" onclick="edit('.$legajo->id.')" class="btn btn-outline-primary"><strong>Ver</strong></a></td>';
                $html .= '</tr>';    
            }    
        }
            
        return response()->json($html); 
    }
}