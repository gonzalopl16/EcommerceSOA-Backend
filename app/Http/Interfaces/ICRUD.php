<?php

namespace App\Http\interfaces;

interface ICRUD {
    public function index();
    public function store(Object $object);
    public function update(Object $object, string $id);
    public function destroy(string $id);
}