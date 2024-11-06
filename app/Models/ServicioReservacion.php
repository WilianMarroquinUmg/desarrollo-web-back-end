<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioReservacion extends Model
{
    use HasFactory;

    protected $table = 'servicios_reservacion';

    public $timestamps = false;


    protected $fillable = [
        'id_reservacion',
        'id_tipo_servicio',
        'descripcion',
    ];

}
