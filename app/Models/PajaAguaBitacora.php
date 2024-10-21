<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajaAguaBitacora extends Model
{
    use HasFactory;

    protected $table = 'paja_agua_bitacoras';

    protected $fillable = [
        "fecha_registro",
        "residente_id",
        "paja_agua_id",
        "transaccion_id",
        "direccion_id",
        "user_transacciona_id",
        "observaciones",
    ];

    public function pajaAgua()
    {
        return $this->belongsTo(PajaAgua::class, 'paja_agua_id', 'id');
    }

    public function transaccion()
    {
        return $this->belongsTo(TipoAdquisicion::class, 'transaccion_id', 'id');

    }

    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'direccion_id', 'id');

    }

    public function userTransacciona()
    {
        return $this->belongsTo(User::class, 'user_transacciona_id', 'id');
    }

    public function residente()
    {
        return $this->belongsTo(Residente::class, 'residente_id', 'id');
    }


}










