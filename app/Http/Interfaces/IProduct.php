<?php

namespace App\Http\interfaces;

use App\Models\Producto;

interface IProduct extends ICRUD{
    public function show(String $id):Producto;
}