<?php

namespace Database\Seeders;

use App\Models\TipoAdquisicion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoTransaccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        TipoAdquisicion::truncate();

        TipoAdquisicion::firstOrCreate([
            'nombre' => 'Compra',
        ]);

        TipoAdquisicion::firstOrCreate([
            'nombre' => 'Herencia',
        ]);

        TipoAdquisicion::firstOrCreate([
            'nombre' => 'Donacion',
        ]);

        TipoAdquisicion::firstOrCreate([
            'nombre' => 'Primer Dueño (Trabajo en su momento)',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

}
