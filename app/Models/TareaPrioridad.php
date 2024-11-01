<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaPrioridad extends Model
{
    use HasFactory;

    protected $table = 'tarea_prioridades';

    protected $fillable = [
        'nombre',
    ];

}
