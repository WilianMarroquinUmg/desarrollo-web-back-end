<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residente extends Model
{
    use HasFactory;

    protected $table = 'residentes';

    protected $fillable = [
        "primer_nombre",
        "segundo_nombre",
        "tercer_nombre",
        "primer_apellido",
        "segundo_apellido",
        "apellido_casada",
        "dpi",
        "fecha_nacimiento",
        "direccion_id",
        "sexo"
    ];

}
