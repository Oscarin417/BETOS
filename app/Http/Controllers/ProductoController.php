<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Traits\TraitSubirArchivo;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    use TraitSubirArchivo;

    function __construct()
    {
        $this->middleware(
            'permission:ver-producto|crear-producto|editar-producto|borrar-producto',
            ['only' => ['index']]
        );
        $this->middleware('permission:crear-producto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-producto', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(5);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'imagen' => 'required|image|mimes:jpeg,jpg,png,svg'
        ]);

        $producto = new Producto();
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->quanty = $request->get('quanty');


        if ($request->has('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::random(15);
            $folder = 'portadas';
            $imagenCargada = $this->subirArchivo($imagen, $folder, 'public', $nombreImagen);
            $producto->imagen = $imagenCargada;
        }

        $producto->save();
        return redirect()->route('productos.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.editar', compact('producto'));
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
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);

        $producto = Producto::find($id);
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->quanty = $request->get('quanty');

        if ($request->has('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::random(15);
            $folder = 'portadas';
            $imagenCargada = $this->subirArchivo($imagen, $folder, 'public', $nombreImagen);
            $producto->imagen = $imagenCargada;
        }

        $producto->save();
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
