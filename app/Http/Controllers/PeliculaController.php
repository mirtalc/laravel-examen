<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelicula::all();

        if (count($data) === 0) {
            $status = 404;
            $message = "Vaya, no hay peliculas en la tabla";
        } else {
            $status = 200;
            $message = "OK, peliculas encontradas";
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
        $data = Pelicula::create($request->all());

        $status = 200;
        $message = "OK, pelicula creada";

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
        $data = Pelicula::find($id);

        if ($data !== null) {
            $status = 200;
            $message = "OK, pelicula encontrada";
        } else {
            $status = 404;
            $message = "Vaya, no se encontró la pelicula";
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
        $data = Pelicula::find($id);

        if ($data !== null) {
            // Modificamos pelicula.
            $data->update($request->all());

            $status = 200;
            $message = "OK, pelicula modificada";
        } else {
            $status = 404;
            $message = "Vaya, no se encontró la pelicula";
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
        $data = Pelicula::find($id);

        if ($data !== null) {
            $data->delete();
            $status = 200;
            $message = "OK, pelicula eliminada";
        } else {
            $status = 404;
            $message = "Vaya, no se encontró la pelicula";
        }

        return response()->json([
            "data" => $data,
            "status" => $status,
            "message" => $message
        ]);
    }
}
