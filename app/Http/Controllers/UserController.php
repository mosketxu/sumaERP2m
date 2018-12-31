<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Role};
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::with([
            'role',
        ])->get();

        return view('partials.erp.users.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        
        return view('partials.erp.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles=Role::all();

        return view('partials.erp.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
    }
}
