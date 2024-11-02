<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Aquí puedes registrar comandos personalizados
        // \App\Console\Commands\EnviarNotificacionesTareas::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Configura la tarea para que se ejecute cada minuto
        $schedule->command('app:notificar-tarea')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
