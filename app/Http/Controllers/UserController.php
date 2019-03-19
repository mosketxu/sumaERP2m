<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App \{
    User,
    Role,
    Empresa,
    UserEmpresa
};
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->authorizeResource(User::class, 'update'); revisar esto no consigo que funcione
    }

    public function index()
    {
        $usuarios = User::get();
        return view('erp.users.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::all();
        $empresas = Empresa::all();
        return view('erp.users.create', compact('roles', 'empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'newusername' => 'required',
            'newuseremail' => 'required|email|unique:users,email',
            'newuserpassword' => 'required|min:6|confirmed',
            'newuserrole' => 'required'
        ]);

        $user = new User([
            'name' => $request->get('newusername'),
            'lastname' => $request->get('newuserlastname'),
            'email' => $request->get('newuseremail'),
            'password' => bcrypt($request->get('newuserpassword')),
            'role' => $request->get('newuserrole'),
        ]);
        $user->save();

        $userEmpresas = $request->newuserempresaId;

        $cont = 0;
        while ($cont  < count($userEmpresas)) {
            $useremp = new UserEmpresa();
            $useremp->user_id = $user->id;
            $useremp->empresa_id = $userEmpresas[$cont];
            $useremp->save();
            $cont = $cont + 1;
        }

        return redirect('/erp/user')->with('success', 'el usuario ' . $user->name . ' se ha añadido');
    }

    public function show($slug)
    {
        //
    }

    public function edit($id)
    {
        $userEdit = User::find($id);
        $roles = Role::all();

        $empresasDisponibles = Empresa::whereNotIn('id', function ($query) use ($id) {
            $query->select('empresa_id')->from('user_empresas')->where('user_id', '=', $id);
        })
            ->get();
        $empresasAsociadas = Empresa::whereIn('id', function ($query) use ($id) {
            $query->select('empresa_id')->from('user_empresas')->where('user_id', '=', $id);
        })
            ->get();

        return view('erp.users.edit', compact('user', 'userEdit', 'roles', 'empresasDisponibles', 'empresasAsociadas'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'username' => 'required',
            // 'useremail'=> 'required|email|unique:users,email,'.$user->id,
            'useremail' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id), ],
            'userpassword' => 'confirmed',
            'userrole' => 'required'
        ], [
            'username.required' => 'El Nombre es obligatorio',
            'useremail.required' => 'El Email es obligatorio',
            'useremail.unique' => 'El Email ya existe',
            'userpassword.required' => 'El Password es obligatorio',
            'userpassword.confirmed' => 'El Password no coincide'
        ]);

        if ($data['userpassword'] != null && strlen($request->get('userpassword')) < 6) {
            return redirect()->back()->withInput()->withErrors('El password debe tener al menos 6 caracteres');
        }

        $user->name = $request->get('username');
        $user->lastname = $request->get('userlastname');
        $user->email = $request->get('useremail');
        if ($data['userpassword'] != null) {
            $data['password'] = bcrypt($request->get('userpassword'));
        } else {
            unset($data['password']);
        }
        $user->role = $request->get('userrole');
        $user->update($data);
        return redirect('/erp/user')->with('success', 'el usuario ' . $user->name . ' se ha actualizado');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $usuario = User::findOrfail($id);
        if ($user->can('delete', $user)) {
            $usuario->delete();
            return redirect()->route('user.index')->with('status', 'Usuario ' . $usuario->name . ' eliminado!');;
        } else {
            echo 'Not Authorized.';
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('erp.users.profile', compact('user', $user));
    }

    public function update_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('img/avatar', $avatarName);
        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success', 'You have successfully upload image.');
    }
}
