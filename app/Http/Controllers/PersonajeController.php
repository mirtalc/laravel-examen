<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personaje;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Personaje::all();

        if (count($data) === 0) {
            $status = 404;
            $message = "Vaya, no hay personajes en la tabla";
        } else {
            $status = 200;
            $message = "OK, personajes encontrados";
        }

        return response()->json([
            "data" => $data,
            "message" => $message,
            "status" => $status
        ]);
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
        $data = Personaje::create($request->all());

        $status = 200;
        $message = "OK, personaje creado";

        return response()->json([
            "data" => $data,
            "status" => $status,
            "message" => $message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Personaje::find($id);

        if ($data !== null) {
            $status = 200;
            $message = "OK, personaje encontrado";
        } else {
            $status = 404;
            $message = "Vaya, no se encontró al personaje";
        }

        return response()->json([
            "data" => $data,
            "status" => $status,
            "message" => $message
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = Personaje::find($id);

        if ($data !== null) {
            // Modificamos personaje. Solo pasan el nombre y el resto tienen que permanecer igual.
            $data->nombre = $request->input("nombre");
            $data->update();

            $status = 200;
            $message = "OK, personaje modificado";
        } else {
            $status = 404;
            $message = "Vaya, no se encontró al personaje";
        }

        return response()->json([
            "data" => $data,
            "status" => $status,
            "message" => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Personaje::find($id);

        if ($data !== null) {
            $data->delete();
            $status = 200;
            $message = "OK, personaje eliminado";
        } else {
            $status = 404;
            $message = "Vaya, no se encontró al personaje";
        }

        return response()->json([
            "data" => $data,
            "status" => $status,
            "message" => $message
        ]);
    }
}
