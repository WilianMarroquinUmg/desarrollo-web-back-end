<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    use HasFactory;

    protected $table = 'tipos_servicios';

    public $timestamps = false;

    protected $fillable = [
        'descripcion',
    ];

}
