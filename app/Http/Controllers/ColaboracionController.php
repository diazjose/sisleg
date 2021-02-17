<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colaboracion;

class ColaboracionController extends Controller
{
    public function create(Request $request){
    	
    	$col = new Colaboracion;

    	$validate = $this->validate($request, [
                'legajo_id' => ['required', 'integer','max:255'],
                'observacion' => ['required', 'string','max:255'],
                'fecha' => ['required', 'date'],
            ]);

    	$col->legajo_id = $request->input('legajo_id');
    	$col->observacion = $request->input('observacion');
    	$col->fecha = $request->input('fecha');

    	$col->save();

        //return view('view_leg', $col->legajo_id);
    	return redirect()->route('view_leg', [$col->legajo_id]);
//                         ->with(['message' => 'Legajo cargado correctamente', 'status' => 'success']);

    }

}
