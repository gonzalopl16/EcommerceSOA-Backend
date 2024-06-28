<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Orden',
        'ID_Producto',
        'cantidad',
        'precio',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'ID_Orden');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }
}
