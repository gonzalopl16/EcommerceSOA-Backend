<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_Orden',
        'monto',
        'fecha',
        'metodo',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'ID_Orden');
    }
}
