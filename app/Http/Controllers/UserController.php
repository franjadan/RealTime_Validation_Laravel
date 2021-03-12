<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function index(){
        
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create(){
        $user = new User;

        return view('users.create', compact('user'));
    }

    public function store(CreateUserRequest $request){

        $request->createUser();

        return redirect()->route('users.index')->with('success', "Se ha creado el usuario con éxito");
    }

}
