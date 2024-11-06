<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;


    protected $table = 'reservaciones';

    public $timestamps = false;

    protected $fillable = [
        'nombre_cliente',
        'fecha',
        'hora',
        'numero_personas',
    ];

}
