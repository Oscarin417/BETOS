<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return $productos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro = new Producto();

        $pro->nombre = $request->nombre;
        $pro->descripcion = $request->descripcion;
        $pro->precio = $request->precio;
        $pro->imagen = $request->imagen;
        $pro->quanty = $request->get('quanty');

        $pro->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request)
    {
        $pro = Producto::findOrFail($request->id);
        $pro->nombre = $request->nombre;
        $pro->descripcion = $request->descripcion;
        $pro->precio = $request->precio;
        $pro->imagen = $request->imagen;
        $pro->quanty = $request->get('quanty');

        $pro->save();

        return $pro;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pro = Producto::destroy($request->id);
        return $pro;
    }
}
