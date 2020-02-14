<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Grupo::all();

        if (count($data) === 0) {
            $status = 404;
            $message = "Vaya, no hay grupos en la tabla";
        } else {
            $status = 200;
            $message = "OK, grupos encontrados";
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
        $data = Grupo::create($request->all());

        $status = 200;
        $message = "OK, grupo creado";

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
        $data = Grupo::find($id);

        if ($data !== null) {
            $status = 200;
            $message = "OK, grupo encontrado";
        } else {
            $status = 404;
            $message = "Vaya, no se encontró al grupo";
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
        $data = Grupo::find($id);

        if ($data !== null) {
            // Modificamos grupo.
            $data->update($request->all());

            $status = 200;
            $message = "OK, grupo modificado";
        } else {
            $status = 404;
            $message = "Vaya, no se encontró al grupo";
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
        $data = Grupo::find($id);

        if ($data !== null) {
            $data->delete();
            $status = 200;
            $message = "OK, grupo eliminado";
        } else {
            $status = 404;
            $message = "Vaya, no se encontró al grupo";
        }

        return response()->json([
            "data" => $data,
            "status" => $status,
            "message" => $message
        ]);
    }
}
