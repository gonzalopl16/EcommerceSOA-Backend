<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Orden',
        'fecha',
        'monto_total',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'ID_Orden');
    }
}
