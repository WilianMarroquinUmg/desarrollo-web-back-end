<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Tarea</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        h2 {
            color: #007BFF; /* Cambia este color según tu preferencia */
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        .priority {
            background-color: #e7f0fe;
            border-left: 4px solid #007BFF;
            padding: 10px;
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>¡Recordatorio de Tarea!</h1>
    <p>Hola,</p>
    <p>Te recordamos que debes realizar la siguiente tarea:</p>

    <h2>{{ $tarea->nombre }}</h2>
    <p><strong>Descripción:</strong> {{ $tarea->descripcion }}</p>
    <p><strong>Fecha de Ejecución:</strong> {{ \Carbon\Carbon::parse($tarea->fecha_ejecucion)->format('d/m/Y') }}</p>
    <p><strong>Hora de Ejecución:</strong> {{ $tarea->hora_ejecucion }}</p>

    <div class="priority">
        <strong>Prioridad:</strong> {{ $tarea->prioridad->nombre }}
    </div>

    <p>Por favor, asegúrate de completar esta tarea a tiempo.</p>

    <p>¡Gracias!</p>

    <div class="footer">
        <p>Este es un mensaje automático. No respondas a este correo.</p>
    </div>
</div>
</body>
</html>
