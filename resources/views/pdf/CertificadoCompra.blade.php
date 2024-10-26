<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Donación</title>
</head>
<body>
<header>
    <h1 style="text-align: center; font-family: 'Times New Roman', serif; font-size: 32px;">
        CONTRATO DE DONACIÓN DE PAJA DE AGUA
    </h1>
</header>

<main>
    <section style="margin: 40px; font-family: 'Times New Roman', serif; font-size: 18px; line-height: 1.6;">
        <h2 style="text-align: center; font-size: 24px;">DECLARACIONES</h2>

        <p style="margin-top: 20px;">
            I. Declara el Sr. {{ $paja->BitacoraRegistroAnterior()->residente->nombre_completo  }},
            que es propietario de la paja de agua identificada con el número {{ $paja->correlativo }},
            ubicada en {{ $paja->BitacoraRegistroAnterior()->direccion->nombre }}.
            Esta operación se acredita con el documento emitido con fecha  {{ $paja->BitacoraRegistroAnterior()->fecha_registro  }},
            y validado por el COCODE  comunitario a través del Sr.
            {{ $paja->BitacoraRegistroAnterior()->userTransacciona->nombre_completo  }}.
        </p>

        <p style="margin-top: 20px;">
            II. Declara el Sr. {{ $paja->BitacoraRegistroActual()->residente->nombre_completo}},
            que acepta y está conforme con la adquisición de la paja de agua
            mencionada, con la nueva/actual direccion en {{ $paja->BitacoraRegistroActual()->direccion->nombre  }},
            y manifiesta que realiza esta operación con pleno conocimiento
            de la declaración anterior.
        </p>

        <h2 style="text-align: center; font-size: 24px; margin-top: 40px;">CLÁUSULAS</h2>

        <p style="margin-top: 20px;">
            1. El comprador se compromete a respetar las normativas vigentes establecidas por la comunidad "El Naranjo"
            en relación con el uso, mantenimiento y disposición de la paja de agua.
        </p>

        <p style="margin-top: 20px;">
            2. El vendedor garantiza que la paja de agua se encuentra libre de cualquier gravamen, obligación o
            situación legal que impida o restrinja su libre venta.
        </p>

        <h3 style="text-align: center; font-size: 20px; margin-top: 40px;">FIRMAS</h3>

        <div class="firma" style="margin-top: 40px;">
            <div style="float: left; width: 45%; text-align: center;">
                F.________________________________________<br/>
                <strong style="font-size: 18px;">{{ $paja->BitacoraRegistroActual()->residente->nombre_completo  }}</strong>
            </div>


            <div style="float: right; width: 45%; text-align: center;">
                F.________________________________________<br/>
                <strong style="font-size: 18px;">{{ $paja->BitacoraRegistroAnterior()->residente->nombre_completo }}</strong>
            </div>
        </div>

        <br/>
        <div class="datos-administrador" style="margin-top: 60px; text-align: center;">
            F.________________________________________<br/>
            <strong style="font-size: 18px;"> {{ $paja->BitacoraRegistroActual()->userTransacciona->nombre_completo  }} </strong>
        </div>

        <div id="fecha-impresion" style="text-align: center; margin-top: 40px; margin-bottom: 10px; padding: 10px">
            Guastatoya, El progreso, <span id="fechaActual"> {{ \Carbon\Carbon::now()->format('d/m/y H:i')  }} </span>
        </div>
    </section>
</main>

</body>
</html>


