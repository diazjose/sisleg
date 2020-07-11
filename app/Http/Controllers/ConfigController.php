<?php

namespace App\Http\Controllers;
use App\Tramite;
use App\Oficina;
use App\Config;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index($id){
    	$oficina = Oficina::find($id);
        $tramites = Tramite::orderBy('denominacion')->get();
    	return view('ConfigOficina.index', ['oficina' => $oficina,'tramites' => $tramites]);
    }

    public function create(Request $request){
    	$validate = $this->validate($request, [
                'tramite_id' => ['required', 'int','max:255'],
            ],
            [
                'tramite_id' => 'Debe seleccionar un tramite',
            ]);

        $oficina = $request->input('oficina_id');
    	$tramite = $request->input('tramite_id');

    	$conf = Config::where('oficina_id', $oficina)->where('tramite_id', $tramite)->get();
    	if (count($conf)>0) {
    		$message = 'El tramite ya exite en la Oficna';
			$status = 'danger';
    	}else{
    		$config = new Config;
	    	$config->oficina_id = $oficina;
	    	$config->tramite_id = $tramite;
	    	$config->hora_inicio = $request->input('hora_inicio');
	    	$config->hora_fin = $request->input('hora_fin');
	    	$config->min_turno = $request->input('min_turno');
			$config->save();	
			$message = 'Configuracion cargada correctamente';
			$status = 'success';
    	}   	

    	return redirect()->route('config.index',[$oficina])
                         ->with(['message' => $message, 'status' => $status]);
    }


    public function update(Request $request){
        $oficina = $request->input('oficina_id');
        $id = $request->input('config_id');

        $config = Config::find($id);
        
        $config->hora_inicio = $request->input('hora_inicio');
        $config->hora_fin = $request->input('hora_fin');
        $config->min_turno = $request->input('min_turno');
        $config->update();

        return redirect()->route('config.index',[$oficina])
                         ->with(['message' => 'La Configuracion fue actualizada con exito', 'status' => 'success']);

    }

    public function destroy(Request $request){
        
        $id = $request->input('id');
        $name = $request->input('tramite');
        $config = Config::find($id);
        $config->delete();

        return redirect()->route('config.index', [$request->input('oficina_id')])
                         ->with(['message' => 'Se ha eliminado el tramite '.$name, 'status' => 'danger']);

    }

    public function search(Request $request){
        $id = $request->input('id');

        $config = Config::where('oficina_id', $id)->get();
        
        $html = '<option selected disabled>--Seleccionar Lugar--</option>';
        foreach ($config as $con) {
            $html .= '<option value="'.$con->tramite_id.'">'.$con->tramite->denominacion.'</option>';   
        }

        return response()->json($html); 

    }

}
