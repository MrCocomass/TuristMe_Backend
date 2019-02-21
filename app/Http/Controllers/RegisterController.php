<?php

namespace App\Http\Controllers;

use App\Places;

use Illuminate\Http\Request;
use\Firebase\JWT\JWT;
use App\User;


class RegisterController extends Controller
{
    public function Register()
    {
        
        $inputs = $_POST;

        $userDB = User::where('email', $inputs['email'])->first();

        if (empty($userDB)) 
        {
            return $this->error(401, 'campos vacios');
        }

        if ($userDB->password == $inputs['password'] && $userDB->id_Roles == 1) 
        {
            $key = "ñasjdlfjuf982378765dslkñfj7asdnk_;sdf";
            $dataTokenUser = array(
                "email" => $userDB->email,
                "password" => $userDB->password,
                "name"=>$userDB->name

            );

            // if (strlen($inputs['password']) <8)
            // {
            // return $this->error(400, 'contraseña debe tener al menos 8 caracteres');
            // }

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = App\Places::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function show(Places $places)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function edit(Places $places)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Places $places)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function destroy(Places $places)
    {
        //
    }
}
