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


    public function index(){
        return view('personas.index');
    }

    public function view($id){
        $person = Persona::find($id);
        $cargos = Cargo::where('person_id',$id)->get();
        return view('personas.view', ['persona' => $person, 'cargos' => $cargos]);
    }

    public function create(Request $request){
    	$id = $request->input('id_persona');
        if (empty($id)) {
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
            $persona->address = strtoupper($request->input('address'));
            $persona->phone = $request->input('phone');
            $persona->save();
            $id = $persona->id;
        }    	
    	    	
    	$cargo = new Cargo;
        $cargo->legajo_id = $request->input('legajo');
    	$cargo->person_id = $id;
    	$cargo->cargo = strtoupper($request->input('cargo'));
        $cargo->tipo = $request->input('tipo');
    	$cargo->fecha_inicio = $request->input('fecha_inicio');
        if ($request->input('tipo') == 'Provisorio') {
            $cargo->fecha_fin = $request->input('fecha_fin');
        }else{
            $fecha_fin = date("Y-m-d",strtotime($request->input('fecha_inicio')."+ 90 year"));
            $cargo->fecha_fin = $fecha_fin;
        }
    	$cargo->estado = 'Activo';

    	$cargo->save();

    	return redirect()->route('view_leg', [$request->input('legajo')])
                         ->with(['message' => 'Cargo agregado con exito', 'status' => 'success']);
	}

    public function editar($id){
        $persona = Persona::find($id);
        return view('personas.editar', ['persona' => $persona]);
    }

    public function editarPersona(Request $request){
        $id = $request->input('id_persona');
        $persona = Persona::find($id);  
        $validate = $this->validate($request, [
                'name' => ['required', 'string','max:255'],
                'surname' => ['required', 'string','max:255'],
                'dni' => ['required', 'string','max:51', 'unique:persons,dni,'.$id],
                'email' => ['required', 'string', 'email','max:255', 'unique:persons,email,'.$id],
            ],
            [
                'dni.unique' => 'Ya existe una Persona con este N° de DNI',
                'email.unique' => 'Ya existe una Persona con este Correo Electronico',
            ]);
        $persona->name = strtoupper($request->input('name'));
        $persona->surname = strtoupper($request->input('surname'));
        $persona->dni = $request->input('dni');
        $persona->email = $request->input('email');
        $persona->address = $request->input('address');
        $persona->phone = $request->input('phone');
        
        $persona->update();
        return redirect()->route('person_view', [$id])
                         ->with(['message' => 'Persona Actualizado con exito', 'status' => 'success']);
    
    }

    public function edit($id){
        $cargo = Cargo::find($id);
        return view('personas.edit', ['cargo' => $cargo]);
    }

    public function update(Request $request){
        
        $id = $request->input('id_persona');
        $persona = Persona::find($id);  
        $validate = $this->validate($request, [
                'name' => ['required', 'string','max:255'],
                'surname' => ['required', 'string','max:255'],
                'dni' => ['required', 'string','max:51', 'unique:persons,dni,'.$id],
                'email' => ['required', 'string', 'email','max:255', 'unique:persons,email,'.$id],
            ],
            [
                'dni.unique' => 'Ya existe una Persona con este N° de DNI',
                'email.unique' => 'Ya existe una Persona con este Correo Electronico',
            ]);
        $persona->name = strtoupper($request->input('name'));
        $persona->surname = strtoupper($request->input('surname'));
        $persona->dni = $request->input('dni');
        $persona->email = $request->input('email');
        $persona->address = $request->input('address');
        $persona->phone = $request->input('phone');
        
        $persona->update();

        $cargo_id = $request->input('cargo_id');
        $cargo = Cargo::find($cargo_id);
        $cargo->cargo = strtoupper($request->input('cargo'));
        $cargo->tipo = $request->input('tipo');
        $cargo->fecha_inicio = $request->input('fecha_inicio');
        if ($request->input('tipo') == 'Provisorio') {
            $cargo->fecha_fin = $request->input('fecha_fin');
        }else{
            $fecha_fin = date("Y-m-d",strtotime($request->input('fecha_inicio')."+ 90 year"));
            $cargo->fecha_fin = $fecha_fin;
        }
        $cargo->estado = $request->input('estado');
        $cargo->update();

        return redirect()->route('view_leg', [$request->input('legajo')])
                         ->with(['message' => 'Cargo Actualizado con exito', 'status' => 'success']);
    }

    public function find(Request $request){
        $buscar = $request->input('buscar');
        if ($buscar == '') {
            $html = '';
        }else{
            $persons = Persona::where('dni','LIKE', '%'.$buscar.'%')
                                ->orWhere('name','LIKE', '%'.$buscar.'%')
                                ->orWhere('surname','LIKE', '%'.$buscar.'%')
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
            $html = '';
            foreach ($persons as $person) {
                $html.= '<tr>'; 
                    $html .= '<td>'.$person->surname.'</td>';
                    $html .= '<td>'.$person->name.'</td>';
                    $html .= '<td>'.$person->dni.'</td>';
                    $html .= '<td>'.$person->phone.'</td>';
                    $html .= '<td><a href="'.route('person_view',[$person->id]).'" class="btn btn-outline-info"><i class="far fa-eye"></i></a></td>';
                $html .= '</tr>';    
            }
        }
            
        return response()->json($html);
    }

    public function search(Request $request){
        $buscar = $request->input('buscar');
        $persona = Persona::where('dni', $buscar)->get();

        if (count($persona)>0) {
            $data['status'] = 'success';
            $data['persona'] = $persona;
        }else{
            $data['status'] = 'danger';
        }
        return response()->json($data); 
    }

    public function destroy(Request $request){
        
        $id = $request->input('id');        
        $cargo = Cargo::find($id);
        $cargo->delete();

        return redirect()->route('view_leg', [$request->input('legajo')])
                         ->with(['message' => 'Un Cargo fue Eliminado recientemente', 'status' => 'danger']);
    
    }

}
