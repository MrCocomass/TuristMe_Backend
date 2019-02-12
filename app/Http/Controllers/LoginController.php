<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use App\User;//Acceder al modelo user

class LoginController extends Controller
{

    public function login()
    {
    	
        $inputs = $_POST;

        $userDB = User::where('email', $inputs['email'])->first();

        if (empty($userDB)) 
        {
            return response()->json([
                'message' => 'usuario o contraseña incorrectos',
            ]);
        }

        if ($userDB->password == $inputs['password']) 
        {
            $key = "ñasjdlfjuf982378765dslkñfj7asdnk_;sdf";
            $dataTokenUser = array(
                "email" => $userDB->email,
                "password" => $userDB->password
            );

            $token = JWT::encode($dataTokenUser, $key);

            return response()->json([
                'token' => $token,
            ]);
        }

    }
}
