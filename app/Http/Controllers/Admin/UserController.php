<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }
    public function index()
    {

        return view('admin.users.index');
    }


    public function create()
    {
        //$users = User::all();
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }


    public function store(Request $request)
    {


        //$usuario=new User();
        //$usuario->name = request('name');
        //$usuario->email = request('email');
        //$usuario->password = request('password');

        $user = User::create($request->all());
        $user->roles()->sync($request->roles);
        //$usuario->save();

        return redirect()->route('admin.users.index')->with('info', 'Usuario registrado correctamente');
    }





    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user->update($request->all());
        $user->roles()->sync($request->roles);
        $user->save();
        return redirect()->route('admin.users.index', $user)->with('info', 'Usuario actualizado correctamente ');
    }
}
