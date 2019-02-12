<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

	public function index()
    {
        $users = App\Users::all();

    }

    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_Roles = 2;

        $user->save();
    }

    public function update(Request $request, User $user)
    {
    	$user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_Roles = $request->id_rol;

        $user->save();
    }

    public function destroy(User $user)
    {
    	$user->delete();
    }
}
