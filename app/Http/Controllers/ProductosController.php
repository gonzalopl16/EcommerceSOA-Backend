<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\DAO\ProductDAO;
use Illuminate\Validation\ValidationException;

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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = $this->productDAO->store((object) $request->all());
        return response()->json($producto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->productDAO->show($id));
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
        $producto = $this->productDAO->update((object) $request->all(), $id);
        $producto->update($request->all());
        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        $this->productDAO->destroy($id);
        $data = [
            'message' => 'Producto Eliminado',
        ];
        return response()->json($data, 204);
    }
}
