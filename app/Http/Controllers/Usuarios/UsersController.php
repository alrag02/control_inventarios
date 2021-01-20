<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::all();
        $roles = Role::all()->pluck('name');
        return view('usuarios.registrados.index', ['users' => $users , 'roles' => $roles]);
    }


    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('usuarios.registrados.create', compact('roles'));
    }

    public function store(Request $request)
    {
            $data = new User();

            $data->name = $request->name;
            $data->last_name_p = $request->last_name_p;
            $data->last_name_m = $request->last_name_m;
            $data->work_id = $request->work_id;
            $data->email = $request->email;
            $data->password = bcrypt($request->password_LOGIN);

            if($data->save()){
                $data->assignRole($request->rol);
                return redirect("usuarios/registrados")->with('message', 'Guardado Correctamente');
            }else{
                return redirect("usuarios/registrados")->with('message', 'Hubo Un Error');
            }
    }

    public function show($id)
    {
        return User::find($id);
    }


    public function edit($id)
    {

        return view('usuarios.registrados.edit',["usuario" => User::find($id), 'roles' => Role::all()->pluck('name', 'id')]);
    }


    public function update(Request $request, $id)
    {
        $data = User::find($id);

        $data->name = $request->name;
        $data->last_name_p = $request->last_name_p;
        $data->last_name_m = $request->last_name_m;
        //$data->work_id = $request->work_id;
        $data->email = $request->email;
        //$data->password = bcrypt($request->password_LOGIN);
        $data->assignRole($request->rol);
        return $data->save() ? redirect("usuarios/registrados")->with('message', 'Editado Correctamente') : redirect("usuarios/registrados")->with('message', 'Hubo Un Error');
    }


    public function destroy($id)
    {
        return User::destroy($id) ? redirect("usuarios/registrados")->with('message', 'Elemento eliminado'): view("usuarios/registrados", print 'Hubo un error al eliminar');
    }


    public function validate_password($pass){
         //return (strlen($pass) >= 8) && (1 === preg_match('~[0-9]~', $pass)) ? true:false);

    }

    public function edit_password($id)
    {
        return view('usuarios.registrados.edit_password',["usuario" => User::find($id)]);
    }

    public function update_password(Request $request, $id){
        $data = User::find($id);
        $data->password = bcrypt($request->password_login);
        return $data->save() ? redirect("usuarios/registrados")->with('message', 'Editado Correctamente') : redirect("usuarios/registrados")->with('message', 'Hubo Un Error');
    }
}
