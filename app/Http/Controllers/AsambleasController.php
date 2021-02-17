<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asamblea;
use App\Legajo;

class AsambleasController extends Controller
{
    public function create(Request $request){

    	$asamblea = new Asamblea();

    	$validate = $this->validate($request, [
                'afecha' => ['required', 'date'],
	            'adocument' => ['required', 'string', 'max:2'],
	        ]);


    	$asamblea->fecha = $request->input('afecha');
		$asamblea->legajo_id = $request->input('id');    	
    	$asamblea->documentacion = $request->input('adocument');
		$asamblea->observacion = $request->input('aobservacion');
		$asamblea->save();

    	$legajo = Legajo::find($request->input('id'));

    	return view('legajos.view', ['legajo' => $legajo]);
        
    }

    public function update(Request $request){
    	$id = $request->input('asam_id');
    	$asamblea = Asamblea::find($id);

    	$validate = $this->validate($request, [
                'afecha' => ['required', 'date'],
	            'adocument' => ['required', 'string', 'max:2'],
	        ]);


    	$asamblea->fecha = $request->input('afecha');
    	$asamblea->documentacion = $request->input('adocument');
		$asamblea->observacion = $request->input('aobservacion');
		$asamblea->update();

		$legajo = Legajo::find($request->input('id'));

    	return view('legajos.view', ['legajo' => $legajo]);
                         //->with(['message' => 'Usuario cargado correctamente', 'status' => 'success']);

    }

}
