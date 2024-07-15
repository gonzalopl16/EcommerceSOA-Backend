<?php

namespace App\Http\Controllers;

use App\DAO\ReclamacionDAO;
use App\Models\Reclamacion;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class ReclamacionController extends Controller
{
    protected $reclamacionDAO;

    public function __construct(ReclamacionDAO $reclamacionDAO)
    {
        $this->reclamacionDAO = $reclamacionDAO;
    }

    public function index()
    {
        $reclamaciones = $this->reclamacionDAO->index();
        return response()->json($reclamaciones);
    }

    public function store(Request $request)
    {
        $reclamacion = new Reclamacion($request->all());

        try {
            $reclamacion = $this->reclamacionDAO->store($reclamacion);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        return response()->json($reclamacion, 201);
    }

    public function show($id)
    {
        try {
            $reclamacion = $this->reclamacionDAO->show($id);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Reclamacion not found'], 404);
        }

        return response()->json($reclamacion);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
