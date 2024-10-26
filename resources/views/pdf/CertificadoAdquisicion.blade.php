<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Adquisición de Paja de Agua</title>
</head>
<body>
<header>
    <h1 style="text-align: center; font-family: 'Times New Roman', serif; font-size: 32px;">
        CONTRATO DE ADQUISICIÓN DE PAJA DE AGUA
    </h1>
</header>

<main>
    <section style="margin: 40px; font-family: 'Times New Roman', serif; font-size: 18px; line-height: 1.6;">
        <h2 style="text-align: center; font-size: 24px;">DECLARACIONES</h2>

        <p style="margin-top: 20px;">
            I. Declara el Sr. {{ $paja->BitacoraRegistroActual()->userTransacciona->nombre_completo }}, en su calidad
            de representante del COCODE de la comunidad "El Naranjo", que en nombre de dicha comunidad se ha llevado a
            cabo la donación de la paja de agua identificada con el número {{ $paja->correlativo }}, ubicada en
            {{ $paja->BitacoraRegistroActual()->direccion->nombre }}.
        </p>

        <p style="margin-top: 20px;">
            II. Declara el Sr. {{ $paja->BitacoraRegistroActual()->residente->nombre_completo }}, que acepta y
            está conforme con la recepción de la paja de agua mencionada.
            El Sr. {{ $paja->BitacoraRegistroActual()->residente->nombre_completo }} manifiesta haber trabajado
            activamente en beneficio de la comunidad "El Naranjo", motivo por el cual le ha sido otorgada dicha
            paja de agua como reconocimiento a su esfuerzo y dedicación.
        </p>

        <h2 style="text-align: center; font-size: 24px; margin-top: 40px;">CLÁUSULAS</h2>

        <p style="margin-top: 20px;">
            1. El beneficiario se compromete a cumplir con las normativas vigentes establecidas por la comunidad "El Naranjo" en relación al uso, mantenimiento y disposición de la paja de agua donada.
        </p>

        <h3 style="text-align: center; font-size: 20px; margin-top: 40px;">FIRMAS</h3>

        <div class="firma" style="margin-top: 40px; margin-bottom: 50px">
            <div style="float: left; width: 45%; text-align: center;">
                F.___________________________<br/>
                <strong style="font-size: 18px;">{{ $paja->BitacoraRegistroActual()->residente->nombre_completo }}</strong><br/>
                <em>Beneficiario</em>
            </div>

            <div style="float: right; width: 45%; text-align: center;">
                F.___________________________<br/>
                <strong style="font-size: 18px;">{{ $paja->BitacoraRegistroActual()->userTransacciona->nombre_completo }}</strong><br/>
                <em>Representante del COCODE</em>
            </div>
        </div>

        <div id="fecha-impresion" style="text-align: center; margin-bottom: 10px; padding: 10px;">
            Guastatoya, El Progreso, <span id="fechaActual">{{ \Carbon\Carbon::now()->format('d/m/y H:i') }}</span>
        </div>
    </section>
</main>

</body>
</html>
