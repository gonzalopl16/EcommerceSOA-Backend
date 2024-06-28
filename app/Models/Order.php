<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Cliente',
        'fecha',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'ID_Orden');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleOrden::class, 'ID_Orden');
    }
}
