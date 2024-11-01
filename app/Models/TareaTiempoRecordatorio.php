<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaTiempoRecordatorio extends Model
{
    use HasFactory;

    protected $table = 'tarea_tiempo_recordatorios';

    protected $fillable = [
        'nombre',
        'valor',
    ];

}
