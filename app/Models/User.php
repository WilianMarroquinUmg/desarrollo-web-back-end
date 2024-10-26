<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'email',
        'password',
    ];

    public static $rules = [
        'primer_nombre' => 'required|string|max:255',
        'segundo_nombre' => 'nullable',
        'primer_apellido' => 'required|string|max:255',
        'segundo_apellido' => 'nullable',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];
    public static $messages = [
        'primer_nombre.required' => 'El primer nombre es requerido.',
        'primer_nombre.string' => 'El primer nombre debe ser una cadena de texto',
        'primer_nombre.max' => 'El nombre debe tener un máximo de 255 caracteres',

        'segundo_nombre.string' => 'El segundo nombre debe ser una cadena de texto',

        'primer_apellido.required' => 'El primer apellido es requerido.',
        'primer_apellido.string' => 'El primer apellido debe ser una cadena de texto',
        'primer_apellido.max' => 'El apellido debe tener un máximo de 255 caracteres',

        'segundo_apellido.string' => 'El segundo apellido debe ser una cadena de texto',

        'email.unique' => 'El email ya esta en uso',
        'email.required' => 'El email es requerido',
        'email.email' => 'El email debe ser un email válido',
        'password.required' => 'La contraseña es requerida',
        'password.min' => 'La contraseña debe tener un mínimo de 6 caracteres',
        'password.confirmed' => 'Las contraseñas no coinciden',
    ];

    public static $loginRules = [
        'email' => 'required|email',
        'password' => 'required',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be appended to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = ['nombre_completo'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getNombreCompletoAttribute()
    {
        return $this->primer_nombre . ' ' . $this->segundo_nombre . ' ' . $this->primer_apellido . ' ' . $this->segundo_apellido;

    }
}
