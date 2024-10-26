<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PajaAgua extends Model
{
    use HasFactory;

    protected $table = 'paja_aguas';

    protected $fillable = [
        'correlativo',
        'residente_id',
    ];

    protected $appends = ['correlativo_direccion'];

    public function residente(): BelongsTo
    {
        return $this->belongsTo(Residente::class, 'residente_id', 'id');

    }

    public function Bitacoras(): HasMany
    {
        return $this->hasMany(PajaAguaBitacora::class, 'paja_agua_id', 'id')->orderBy('id', 'desc');

    }

    public function getCorrelativoDireccionAttribute(): string
    {
        return $this->correlativo . ' - ' . $this->bitacoras->last()->direccion->nombre;
    }

    public function BitacoraRegistroActual()
    {
        return $this->Bitacoras()->latest()->first();

    }

    public function BitacoraRegistroAnterior()
    {
        return $this->bitacoras->count() > 1 ? $this->bitacoras->reverse()->values()->get(1) : null;

    }

    public function BitacoraRegistroAntesAnterior()
    {
        return $this->bitacoras->count() > 2 ? $this->bitacoras->reverse()->values()->get(2) : null;

    }

}
