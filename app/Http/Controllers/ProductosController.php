<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\DAO\ProductDAO;

class ProductosController extends Controller
{
    protected $productDAO;

    public function __construct(ProductDAO $productDAO){
        $this->productDAO = $productDAO;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->productDAO->index());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Not Found';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'nombre' => 'required',
            'descripcion' => 'required',
            'image_path' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'image_path' => $request->image_path,
            'precio' => $request->precio,
            'stock' => $request->stock
        ]);

        return response()->json($producto);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);
        return response()->json($producto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);
        Validator::make($request->all(),[
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);
        $producto->update($request->all());
        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        $producto = Producto::find($id);
        $producto->delete();
        $data = [
            'message' => 'Producto Eliminado',
        ];
        return response()->json($data);
    }
}
