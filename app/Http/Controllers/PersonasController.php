<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Cargo;


class PersonasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request){
    	$persona = new Persona;

    	$validate = $this->validate($request, [
                'name' => ['required', 'string','max:255'],
                'surname' => ['required', 'string','max:255'],
                'dni' => ['required', 'string','max:51', 'unique:persons'],
                'email' => ['required', 'string', 'email','max:255', 'unique:persons'],
            ],
            [
            	'dni.unique' => 'Ya existe una Persona con este N° de DNI',
            	'email.unique' => 'Ya existe una Persona con este Correo Electronico',
            ]);

    	$persona->name = strtoupper($request->input('name'));
    	$persona->surname = strtoupper($request->input('surname'));
    	$persona->dni = $request->input('dni');
    	$persona->email = $request->input('email');
    	$persona->adress = strtoupper($request->input('adress'));
    	$persona->phone = $request->input('phone');
    	
    	$persona->save();

    	$cargo = new Cargo;
    	$cargo->legajo_id = $request->input('legajo');
    	$cargo->person_id = $persona->id;
    	$cargo->cargo = $request->input('cargo');
    	$cargo->fecha_inicio = $request->input('fecha_inicio');
    	$cargo->fecha_fin = $request->input('fecha_fin');

    	$cargo->save();

    	return redirect()->route('view_leg', [$request->input('legajo')]);
	}
}
