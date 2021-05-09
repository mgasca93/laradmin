<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
    *   Metodo principal que utilizare para listar los 
    *   usuarios de la base de datos existentes
    **/
    public function index(){
        $users = User::latest()->get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
    *   Metodo para registrar nuevos usuarios
    *   en la base de datos
    **/
    public function store(Request $request){

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        return back();
    }

    /**
    *   Metodo para eliminar usuarios desde el dashboard
    **/
    public function destroy(User $user){
        $user->delete();
        return back();
    }
}
