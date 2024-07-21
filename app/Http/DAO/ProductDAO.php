<?php

namespace App\Http\DAO;

use App\Http\interfaces\IProduct;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Ramsey\Uuid\Type\Integer;

class ProductDAO{
    public function index() {
        return Producto::all();
    }

    public function store(Object $object) {
        $this->validateProducto($object);
        return Producto::create([
            'nombre' => $object->nombre,
            'descripcion' => $object->descripcion,
            'image_path' => $object->image_path,
            'precio' => $object->precio,
            'stock' => $object->stock,
        ]);
    }

    public function show(String $id): Producto {
        return Producto::findOrFail($id);
    }

    public function update(Object $object, string $id) {
        $producto = Producto::findOrFail($id);
        $this->validateProducto($object);
        $producto->update([
            'nombre' => $object->nombre,
            'descripcion' => $object->descripcion,
            'image_path' => $object->image_path,
            'precio' => $object->precio,
            'stock' => $object->stock,
        ]);
        return $producto;
    }

    public function destroy(string $id) {
        $producto = Producto::findOrFail($id);
        $producto->delete();
    }

    public function decreseStock(String $id, Integer $cantidad){
        $producto = Producto::findOrFail($id);
        if ($producto->stock < $cantidad) {
            throw new \Exception("Stock insuficiente");
        }
        $producto->stock -= $cantidad;
        $producto->save();

    }

    private function validateProducto(Object $object)
    {
        $validator = Validator::make((array) $object, [
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'image_path' => 'nullable',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}