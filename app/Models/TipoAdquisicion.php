<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAdquisicion extends Model
{
    use HasFactory;

    const COMPRA = 1;
    const HERENCIA = 2;
    const DONACION = 3;
    const PRIMER_DUEÑO_TRABAJO_EN_SU_MOMENTO = 4;


    protected $table = 'paja_agua_bitacora_tipo_transacciones';
    protected $fillable = [
        'nombre',
    ];


}
