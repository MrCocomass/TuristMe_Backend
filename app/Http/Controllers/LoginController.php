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
            return $this->error(401, 'campos vacios');
        }

        // if (empty($userDB)) 
        // {
        //     return response()->json([
        //         'message' => 'no tienes permisos',
        //     ], 401);
        // }


        if($inputs['password'] ==null)
        {
            return $this->error(401, 'introdue contraseña');
                
        }
        // if($inputs['password'] ==null)
        // {
        //     return response()->json([
        //         'message' => 'no tienes huevos',
        //     ], 401);
        // }

        if ($userDB->password == $inputs['password'] && $userDB->id_Roles == 1) 
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
        else
        {
            return response()->json([
                'message' => 'no tienes permisos',
            ], 400);
        }

    }


     public function loginUser()
    {
        
        $inputs = $_POST;

        $userDB = User::where('email', $inputs['email'])->first();

        if (empty($userDB)) 
        {
            return response()->json([
                'message' => 'no tienes permisos',
            ], 400);
        }


        if ($userDB->password == $inputs['password'] && $userDB->id_Roles == 2) 
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
        else
        {
            return response()->json([
                'message' => 'no puedes aceeeeeedr',
            ], 400);
        }

    }

}
