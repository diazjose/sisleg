<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oficina;

class OficinasController extends Controller
{
    public function index(){
    	$oficinas = Oficina::orderBy('id','desc')->get();
        return view('oficinas.index', ['oficinas' => $oficinas]);
    }

    public function create(Request $request){

    	$oficina = new Oficina;

    	$validate = $this->validate($request, [
                'denominacion' => ['required', 'string', 'max:255', 'unique:oficinas'],
	            'direccion' => ['required', 'string', 'max:255'],
	            'telefono' => ['required', 'string', 'max:255'],
            ],
            [
            	'denominacion.unique' => 'Esta Oficina ya existe en la Base de Datos',
            ]);


    	$oficina->denominacion = strtoupper($request->input('denominacion'));
    	$oficina->direccion = strtoupper($request->input('direccion'));
		$oficina->telefono = $request->input('telefono');
   	
		$oficina->save();

    	return redirect()->route('oficina.index')
                         ->with(['message' => 'Oficina cargada correctamente', 'status' => 'success']);

    }

     public function update(Request $request){
        $id = $request->input('id');
        
        $oficina = Oficina::find($id);

        $oficina->denominacion = strtoupper($request->input('denominacion'));
        $oficina->direccion = strtoupper($request->input('direccion'));
        $oficina->telefono = $request->input('telefono');
        
        $oficina->update();

        return redirect()->route('oficina.index')
                         ->with(['message' => 'La Oficina "'.$oficina->denominacion.'" fue actualizado con exito', 'status' => 'success']);
    }

    public function destroy(Request $request){
    	
    	$id = $request->input('id');
    	$name = $request->input('oficina');
    	$oficina = Oficina::find($id);
		$oficina->delete();

    	return redirect()->route('oficina.index')
                         ->with(['message' => 'Se ha eliminado la oficina '.$name, 'status' => 'danger']);

    }
}
