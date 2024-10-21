<?php

namespace Database\Seeders;

use App\Models\TipoAdquisicion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoTransaccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TipoAdquisicion::firstOrCreate([
            'nombre' => 'Compra',
        ]);

        TipoAdquisicion::firstOrCreate([
            'nombre' => 'Venta',
        ]);

        TipoAdquisicion::firstOrCreate([
            'nombre' => 'Herencia',
        ]);

        TipoAdquisicion::firstOrCreate([
            'nombre' => 'Donacion',
        ]);
    }
}
