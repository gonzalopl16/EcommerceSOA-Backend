<?php

namespace App\Http\Interfaces;

use App\Http\interfaces\ICRUD;
use App\Models\Reclamacion;

interface IReclamacion{
    public function show(String $id):Reclamacion;
    public function index();
    public function store(Object $object);
    public function update(Object $object, string $id);
    public function destroy(string $id);
}