<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_ejecucion',
        'hora_ejecucion',
        'estado_id',
        'prioridad_id',
        'tipo_id',
        'recordatorio_id',
    ];

    public function estado()
    {
        return $this->belongsTo(TareaEstado::class, 'estado_id');
    }

    public function prioridad()
    {
        return $this->belongsTo(TareaPrioridad::class, 'prioridad_id');
    }

    public function tipo()
    {
        return $this->belongsTo(TareaTipo::class, 'tipo_id');
    }

    public function recordatorio()
    {
        return $this->belongsTo(TareaTiempoRecordatorio::class, 'recordatorio_id');
    }


}

