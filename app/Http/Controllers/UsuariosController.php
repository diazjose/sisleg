<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$users = User::all();
    	return view('usuarios.index', ['users' => $users]);
    }

    public function new()
    {
    	return view('usuarios.new');
    }

    public function create(Request $request){

    	$user = new User;

    	$validate = $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
	            'surname' => ['required', 'string', 'max:255'],
	            'role' => ['required', 'string', 'max:255'],
	            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
            	'email.unique' => 'Este correo ya existe en la Base de Datos',
            	'password.confirmed' => 'Las contraseñas no coinciden',
            ]);


    	$user->name = strtoupper($request->input('name'));
    	$user->surname = strtoupper($request->input('surname'));
		$user->email = $request->input('email');
		$user->role = $request->input('role');
    	$user->password = Hash::make($request->input('password'));
    	
		$user->save();

    	return redirect()->route('users.index')
                         ->with(['message' => 'Usuario cargado correctamente', 'status' => 'success']);

    }

    public function update(Request $request){
    	$id = $request->input('user_id');
    	$user = User::find($id);
    	
    	$user->name = strtoupper($request->input('name'));
    	$user->surname = strtoupper($request->input('surname'));
    	$user->email = $request->input('email');
    	$user->role = $request->input('role');
    	$user->update();

    	return redirect()->route('users.index')
                         ->with(['message' => 'El Usuario '.$user->name.' '.$user->surname.' fue actualizado con exito', 'status' => 'success']);

    }

    public function destroy(Request $request){
    	
    	$id = $request->input('id');
    	$name = $request->input('nombre');
    	
    	$user = User::find($id);

    	$user->delete();

    	return redirect()->route('users.index')
                         ->with(['message' => 'Se ha eliminado a '.$name, 'status' => 'danger']);

    }

    public function search(Request $request){
        $buscar = $request->input('buscar');
        $users = User::where('name','LIKE', '%'.$buscar.'%')
                        ->orWhere('surname','LIKE', '%'.$buscar.'%')
                        ->orWhere('role','LIKE', '%'.$buscar.'%')
                        ->paginate(10);
        $html = '';      
        foreach ($users as $user) {
            $html.= '<tr>'; 
                $html .= '<td>'.$user->surname.'</td>';
                $html .= '<td>'.$user->name.'</td>';
                $html .= '<td>'.$user->role.'</td>';
                $html .= '<td>'.$user->email.'</td>';
                $html .= '<td>';
                    $html .= '<a href="#" class="btn btn-outline-primary" onclick="edit('.$user->id.','.$user->name.','.$user->surname.','.$user->role.','.$user->email.')" data-toggle="modal" data-target="#editModal" title="Editar Usuario" ><i class="fas fa-edit"></i></a>';
                    $html .= '<a href="#" class="btn btn-outline-danger" onclick="Borrar('.$user->id.','.$user->name.','.$user->surname.')" data-toggle="modal" data-target="#confirm" title="Eliminar Usuario"><i class="fas fa-trash-alt"></i></a>';
                $html .= '</td>';
            $html .= '</tr>';    
        }
            
        return response()->json($html); 
    }
}
