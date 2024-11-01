<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaTipo extends Model
{
    use HasFactory;

    protected $table = 'tarea_tipos';

    protected $fillable = [
        'nombre',
    ];

}
