<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'ID_Cliente');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'ID_Cliente');
    }
}
