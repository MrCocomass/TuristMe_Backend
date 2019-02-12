<?php

namespace App\Http\Controllers;

use App\Places;

use Illuminate\Http\Request;
use\Firebase\JWT\JWT;
use App\User;


class PlacesController extends Controller
{

    public function Places()
    {
        echo 'HOLA';
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
        $key = "ñasjdlfjuf982378765dslkñfj7asdnk_;sdf";
        $headers = getallheaders();

        if(!isset($headers['Authorization'])){
            return response()->json([
                'message' => 'no hay autorizacion',
            ]);
        }

        $token = $headers['Authorization'];

        if (!isset($token)) {
            return response()->json([
                'message' => 'no tienes permisos',
            ]);
        }

        $tokenDecoded = JWT::decode($token, $key, array('HS256'));

        $userDB = User::where('email', $tokenDecoded->email)->first();

        if (empty($userDB)) 
        {
            return response()->json([
                'message' => 'no tienes permisos',
            ]);
        }

        if ($userDB->password == $tokenDecoded->password)
        {
            $places = new Places;

            $places->name = $request->name;
            $places->description = $request->description;
            $places->coordenate_x = $request->coordenate_x;
            $places->coordenate_y = $request->coordenate_y;
            $places->date_start = $request->date_start;
            $places->date_end = $request->date_end;
            
            $places->save();

            return response()->json([
                'message' => "lugar creado",
            ]);
        }

        
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
    public function update(Request $request, Places $place)
    {
        $place->name = $request->name;
        $place->description = $request->description;
        $place->coordenate_x = $request->coordenate_x;
        $place->coordenate_y = $request->coordenate_y;
        $place->date_start = $request->date_start;
        $place->date_end = $request->date_end;
        
        $place->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function destroy(Places $place)
    {
        $place->delete();
    }
}
