<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamacion extends Model
{
    use HasFactory;

    protected $table = 'reclamaciones';
    protected $fillable = [
        'id_cliente',
        'DNI',
        'fecha',
        'detalle_reclamo',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
