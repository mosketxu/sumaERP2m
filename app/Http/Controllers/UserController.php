<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Role};
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $usuarios = User::with([
            'role',
        ])->get();
        return view('partials.erp.users.index', compact('usuarios','user'));
    }

    public function create()
    {
        $roles=Role::all();
        return view('partials.erp.users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'useremail'=> 'required|email|unique:users,email',
            'userpassword' => 'required|min:6|confirmed',
            'userroleId'=>'required'
        ]);
        $user = new User([
            'name' => $request->get('username'),
            'lastname' => $request->get('userlastname'),
            'email'=> $request->get('useremail'),
            'password'=> bcrypt($request->get('userpassword')),
            'role_id'=> $request->get('userroleId'),
        ]);
          $user->save();
          return redirect('/erp/user')->with('success', 'el usuario '. $user->name.' se ha añadido');
    }

    public function show($slug)
    {
        //
    }

    public function edit($id)
    {
        $user = Auth::user();
        $userEdit = User::find($id);
        $roles=Role::all();

        return view('partials.erp.users.edit', compact('user','userEdit','roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data=$request->validate([
            'username'=>'required',
            // 'useremail'=> 'required|email|unique:users,email,'.$user->id,
            'useremail'=> ['required','email',Rule::unique('users','email')->ignore($user->id),],
            'userpassword' => 'confirmed',
            'userroleId'=>'required'
        ],[
            'username.required'=>'El Nombre es obligatorio',
            'useremail.required'=>'El Email es obligatorio',
            'useremail.unique'=>'El Email ya existe',
            'userpassword.required'=>'El Password es obligatorio',
            'userpassword.confirmed'=>'El Password no coincide'
        ]);

        if ($data['userpassword']!=null && strlen($request->get('userpassword'))<6)
        {
            return redirect()->back()->withInput()->withErrors('El password debe tener al menos 6 caracteres');
        }
       
        $user->name = $request->get('username');
        $user->lastname = $request->get('userlastname');
        $user->email= $request->get('useremail');
        if($data['userpassword']!=null){
            $data['password']=bcrypt($request->get('userpassword'));
        }else{
            unset($data['password']);
        }
        $user->role_id= $request->get('userroleId');
        // $user->save();
        $user->update($data);
        return redirect('/erp/user')->with('success', 'el usuario '. $user->name.' se ha actualizado');
    }

    public function destroy($slug)
    {
        //
    }

    public function profile()
    {
        $user = Auth::user();
        return view('partials.erp.users.profile',compact('user',$user));
    }

    public function update_avatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('img/avatar',$avatarName);
        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');
    }
}
