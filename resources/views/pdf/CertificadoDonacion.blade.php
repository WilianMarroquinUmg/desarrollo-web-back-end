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
            I. Declara el Sr. {{ $paja->BitacoraRegistroActual()->userTransacciona->nombre_completo  }},
            quien es actual COCODE de la comunidad "El Naranjo", y en representación de la misma,
            manifiesta que se ha realizado la donación de la paja de agua identificada con el número {{ $paja->correlativo }},
            ubicada en {{ $paja->BitacoraRegistroActual()->direccion->nombre }}.
        </p>

        <p style="margin-top: 20px;">
            II. Declara el Sr. {{ $paja->BitacoraRegistroActual()->residente->nombre_completo}},
            que acepta y está conforme con la adquisición de la paja de agua
            mencionada, ubicada en {{ $paja->BitacoraRegistroActual()->direccion->nombre  }},
            y manifiesta que realiza esta operación con pleno conocimiento
            de la declaración anterior.
        </p>

        <h2 style="text-align: center; font-size: 24px; margin-top: 40px;">CLÁUSULAS</h2>

        <p style="margin-top: 20px;">
            1. El beneficiario se compromete a respetar las normativas vigentes establecidas por la comunidad "El Naranjo"
            en relación con el uso, mantenimiento y disposición de la paja de agua.
        </p>

        <h3 style="text-align: center; font-size: 20px; margin-top: 40px;">FIRMAS</h3>

        <div class="firma" style="margin-top: 40px;">
            <div style="float: left; width: 45%; text-align: center;">
                F.____________________________________<br/>
                <strong style="font-size: 18px;">{{ $paja->BitacoraRegistroActual()->residente->nombre_completo  }}</strong>
            </div>

            <div style="float: right; width: 45%; text-align: center;">
                F.____________________________________<br/>
                <strong style="font-size: 18px;"> {{ $paja->BitacoraRegistroActual()->userTransacciona->nombre_completo  }} </strong>
            </div>
        </div>

        <br/>


        <div id="fecha-impresion" style="text-align: center; margin-top: 40px; margin-bottom: 10px; padding: 10px">
            Guastatoya, El progreso, <span id="fechaActual"> {{ \Carbon\Carbon::now()->format('d/m/y H:i')  }} </span>
        </div>
    </section>
</main>

</body>
</html>


