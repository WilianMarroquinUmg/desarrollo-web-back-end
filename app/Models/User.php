<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];
    public static $messages = [
        'name.required' => 'El nombre es requerido',
        'name.string' => 'El nombre debe ser una cadena de texto',
        'name.max' => 'El nombre debe tener un máximo de 255 caracteres',
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
}
