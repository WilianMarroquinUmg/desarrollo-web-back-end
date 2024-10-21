<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAdquisicion extends Model
{
    use HasFactory;


    protected $table = 'paja_agua_bitacora_tipo_transacciones';
    protected $fillable = [
        'nombre',
    ];


}
