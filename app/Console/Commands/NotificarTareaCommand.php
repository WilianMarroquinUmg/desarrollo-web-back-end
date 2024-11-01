<?php

namespace App\Console\Commands;

use App\Models\Tarea;
use App\Models\TareaEstado;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotificarTareaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notificar-tarea';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $tareasPendientes = Tarea::whereEstadoId(TareaEstado::PENDIENTE)
            ->whereDate('fecha_ejecucion', Carbon::now()->toDateString())
            ->get();

        foreach ($tareasPendientes as $tarea) {
            if ($tarea->hora_ejecucion !== null) {
                $fechaHoraEjecucion = Carbon::createFromFormat('Y-m-d H:i:s', $tarea->fecha_ejecucion . ' ' . $tarea->hora_ejecucion)
                    ->startOfMinute();
                $horaActual = Carbon::now()->startOfMinute();

                $minutosDiferencia = (int)$horaActual->diffInMinutes($fechaHoraEjecucion);

                if ($minutosDiferencia === $tarea->recordatorio->valor) {
                    $this->info('Notificar tarea: ' . $tarea->nombre);
                }
            }
        }



    }
}
