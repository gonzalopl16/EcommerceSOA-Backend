<?php

namespace App\Http\Interfaces;

use App\Http\interfaces\ICRUD;
use App\Models\Reclamacion;

interface IReclamacion extends ICRUD{
    public function show(String $id):Reclamacion;
}