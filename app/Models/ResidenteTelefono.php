<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenteTelefono extends Model
{
    use HasFactory;
}

protected $table = 'residentes_telefono';
protected $fillable = [
    "residente_id",
    "telefono"
];
