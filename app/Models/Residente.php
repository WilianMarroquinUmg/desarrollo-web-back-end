<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $appends = ['nombre_completo', 'dpi_y_nombre'];


    public function getNombreCompletoAttribute()
    {

        return $this->primer_nombre . ' ' . $this->segundo_nombre . ' ' . $this->tercer_nombre . ' ' . $this->primer_apellido . ' ' . $this->segundo_apellido . ' ' . $this->apellido_casada;

    }

    public function getDpiYNombreAttribute()
    {

        return $this->dpi . ' - ' . $this->nombre_completo;

    }

    public function direccion(): BelongsTo
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }


}
