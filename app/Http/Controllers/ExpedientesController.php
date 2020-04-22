<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function new($id = ''){
    	return view('expedientes.new', ['id' => $id]);
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
	                $html .= '<td><a href="'.route('exp_view',[$exp->id]).'" class="btn btn-outline-info"><i class="far fa-eye"></i></a></td>';
	            $html .= '</tr>';    
	        }	
        }
            
        return response()->json($html); 
    }

    public function search_area(Request $request){
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
                $seg = Seguimiento::where('expediente_id', $exp->id)->where('lugar', Auth::user()->role)->get();
                if (count($seg) > 0) {
                    $html.= '<tr>'; 
                        $html .= '<td>'.$exp->numero.'</td>';
                        $html .= '<td>'.$exp->iniciador.'</td>';
                        $html .= '<td>'.$exp->asunto.'</td>';
                        $html .= '<td><a href="'.route('exp_area_view',[$exp->id]).'" class="btn btn-outline-info"><i class="far fa-eye"></i></a></td>';
                    $html .= '</tr>';    
                }else{
                    $html .= 'no hay expediente';                   
                }   
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

    public function area(Request $request){
        $area = Auth::user()->role;
        $exp = Seguimiento::where('lugar', $area)->where('estado','warning')->get();
        return view('expedientes.area', ['exps' => $exp]);   
    }

    public function exp_area($id){
        
        $exp = Seguimiento::find($id);
        return view('expedientes.area_view', ['exp' => $exp]);
    }

    public function exp_status(Request $request){
        
        $exp = Seguimiento::find($request->input('exp_id'));
        $exp->estado = $request->input('estado');
        $exp->observacion = $request->input('observacion');
        
        $exp->update();
        return view('expedientes.area_view', ['exp' => $exp]);
    }
}

