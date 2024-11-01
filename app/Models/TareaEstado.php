<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaEstado extends Model
{
    use HasFactory;

    protected $table = 'tarea_estados';

    protected $fillable = [
        'nombre',
    ];

}
