<?php

namespace App\Http\Controllers;

use App\Http\DAO\ReclamacionDAO;
use App\Models\Reclamacion;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $reclamo = $this->reclamacionDAO->store((object) $request->all());
        return response()->json($reclamo, 201);
    }

    public function show(string $id)
    {
        return response()->json($this->reclamacionDAO->show($id));
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
