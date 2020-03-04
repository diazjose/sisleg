<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Legajo;
use App\Expediente;
use App\Seguimiento;

class ExpedientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('expedientes.index');
    }
    public function new(){
    	return view('expedientes.new');
    }

     public function create(Request $request){
    	
    	$exp = new Expediente;

    	$validate = $this->validate($request, [
                'numero' => ['required', 'string','max:255', 'unique:expedientes'],
                'asunto' => ['required', 'string','max:255'],
            ],
            [
            	'numero.unique' => 'El N° Expediente ya existe en la Base de Datos',
            ]);

    	$exp->legajo_id = $request->input('legajo');
    	$exp->numero = $request->input('numero');
    	$exp->iniciador = strtoupper($request->input('iniciador'));
    	$exp->asunto = strtoupper($request->input('asunto'));
    	if (!empty($request->input('observacion'))) {
    		$exp->observacion = $request->input('observacion');	
    	}
    	$exp->archivado = $request->input('archivado');
    	$exp->fojas = $request->input('fojas');
    	$exp->formulario = $request->input('formulario');
		
		$exp->save();

    	return redirect()->route('exp_new')
                         ->with(['message' => 'Expediente cargado correctamente', 'status' => 'success']);

    }

    public function view($id){
    	$exp = Expediente::find($id);
    	return view('expedientes.view', ['exp' => $exp]);
    }

    public function search(Request $request){
        $buscar = $request->input('buscar');
        if ($buscar == '') {
            $html = '';
        }else{
        	$exps = Expediente::where('numero','LIKE', '%'.$buscar.'%')
	                            ->orWhere('formulario','LIKE', '%'.$buscar.'%')
	                            ->orderBy('id', 'DESC')
	                            ->paginate(10);
	        
	        $html = '';
	        foreach ($exps as $exp) {
	            $html.= '<tr id="$Legajo->id">'; 
	                $html .= '<td>'.$exp->numero.'</td>';
	                $html .= '<td>'.$exp->iniciador.'</td>';
	                $html .= '<td>'.$exp->asunto.'</td>';
	                $html .= '<td></td>';
	                $html .= '<td><a href="'.route('exp_view',[$exp->id]).'" class="btn btn-outline-info"><strong>Ver</strong></a></td>';
	            $html .= '</tr>';    
	        }	
        }
            
        return response()->json($html); 
    }

    public function edit($id){
        $exp = Expediente::find($id);
        return view('expedientes.edit', ['exp' => $exp]);
    }

    public function update(Request $request){
    	
        $id = $request->input('id');
    	$exp = Expediente::find($id);        

    	$validate = $this->validate($request, [
                'numero' => ['required', 'string','max:255', 'unique:expedientes,numero,'.$id],
                'asunto' => ['required', 'string','max:255'],
            ],
            [
            	'numero.unique' => 'El N° Expediente ya existe en la Base de Datos',
            ]);
        $exp->numero = $request->input('numero');
    	$exp->iniciador = strtoupper($request->input('iniciador'));
    	$exp->asunto = strtoupper($request->input('asunto'));
    	if (!empty($request->input('observacion'))) {
    		$exp->observacion = $request->input('observacion');
        }
    	$exp->archivado = $request->input('archivado');
    	$exp->fojas = $request->input('fojas');
    	$exp->formulario = $request->input('formulario');
		
        
		$exp->update();

    	return redirect()->route('exp_view', [$id])
                         ->with(['message' => 'Expediente actualizado correctamente', 'status' => 'success']);
    }

    public function tracing(Request $request){
        $seg = new Seguimiento;

        $id = $request->input('exp_id');
        $seg->expediente_id = $id;
        $seg->lugar = $request->input('lugar');
        if (!empty($request->input('observacion'))) {
            $seg->observacion = $request->input('observacion');    
        }
        $seg->estado = 'warning';
        
        $seg->save();
        return redirect()->route('exp_view', [$id])
                         ->with(['message' => 'El expediente se encuentra en un lugar nuevo', 'status' => 'success']);
    }
}

