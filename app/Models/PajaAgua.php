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

    public function residente(): BelongsTo
    {
        return $this->belongsTo(Residente::class, 'residente_id', 'id');

    }

    public function Bitacoras(): HasMany
    {
        return $this->hasMany(PajaAguaBitacora::class, 'paja_agua_id', 'id');

    }

}
