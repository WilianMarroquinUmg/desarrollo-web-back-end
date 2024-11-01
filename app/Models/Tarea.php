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
        'tarea_estados_id',
        'tarea_prioridades_id',
        'tarea_tipos_id'
    ];

    public function tareaEstado()
    {
        return $this->belongsTo(TareaEstado::class, 'tarea_estados_id');
    }

    public function tareaPrioridad()
    {
        return $this->belongsTo(TareaPrioridad::class, 'tarea_prioridades_id');
    }

    public function tareaTipo()
    {
        return $this->belongsTo(TareaTipo::class, 'tarea_tipos_id');
    }


}
