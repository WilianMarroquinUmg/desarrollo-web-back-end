<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::firstOrCreate([
            'primer_nombre' => 'Admin',
            'segundo_nombre' => 'Developer',
            'primer_apellido' => 'AdminApellido',
            'segundo_apellido' => 'AdminSecondApellido',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
