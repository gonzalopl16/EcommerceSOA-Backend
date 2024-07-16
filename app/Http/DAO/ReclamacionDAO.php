<?php

namespace App\Http\DAO;

use App\Http\Interfaces\IReclamacion;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Reclamacion;

class ReclamacionDAO implements IReclamacion
{
    public function index() {
        return Reclamacion::all();
    }
    
    public function update(Object $object, string $id) {
    }

    public function destroy(string $id) {}
    
    public function store(Object $object) {
        $this->validateReclamacion($object);
        return Reclamacion::create([
            'id_cliente' => $object->id_cliente,
            'DNI' => $object->DNI,
            'fecha' => $object->fecha,
            'detalle_reclamo' => $object->detalle_reclamo,
        ]);
    }

    public function show(String $id): Reclamacion {
        return Reclamacion::findOrFail($id);
    }

    private function validateReclamacion(Object $object)
    {
        $validator = Validator::make((array) $object, [
            'id_cliente' => 'required',
            'DNI' => 'required|string|max:255',
            'fecha' => 'required|date',
            'detalle_reclamo' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
