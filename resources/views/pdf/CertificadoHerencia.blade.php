<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Herencia de Paja de Agua</title>
</head>
<body>
<header>
    <h1 style="text-align: center; font-family: 'Times New Roman', serif; font-size: 32px;">
        CERTIFICADO DE HERENCIA DE PAJA DE AGUA
    </h1>
</header>

<main>
    <section style="margin: 40px; font-family: 'Times New Roman', serif; font-size: 18px; line-height: 1.6;">
        <h2 style="text-align: center; font-size: 24px;">DECLARACIONES</h2>

        <p style="margin-top: 20px;">
            I. El Sr. {{ $paja->BitacoraRegistroAnterior()->residente->nombre_completo }}, en su calidad de propietario, declara poseer la paja de agua número {{ $paja->correlativo }}, ubicada en {{ $paja->BitacoraRegistroAnterior()->direccion->nombre }}. Esta propiedad está documentada en el registro emitido el {{ $paja->BitacoraRegistroAnterior()->fecha_registro }}, avalado por el COCODE comunitario a través del Sr. {{ $paja->BitacoraRegistroAnterior()->userTransacciona->nombre_completo }}.
        </p>

        <p style="margin-top: 20px;">
            II. El Sr. {{ $paja->BitacoraRegistroActual()->residente->nombre_completo }} acepta la herencia de la mencionada paja de agua, ahora registrada en {{ $paja->BitacoraRegistroActual()->direccion->nombre }}. Declara que realiza esta aceptación en pleno conocimiento de los antecedentes y condiciones aquí descritos.
        </p>

        <h2 style="text-align: center; font-size: 24px; margin-top: 40px;">CLÁUSULAS</h2>

        <p style="margin-top: 20px;">
            1. El adquiriente se compromete a cumplir con las normativas vigentes establecidas por la comunidad "El Naranjo" para el uso, mantenimiento y disposición de la paja de agua.
        </p>

        <p style="margin-top: 20px;">
            2. El heredante garantiza que la paja de agua se encuentra libre de gravámenes, obligaciones o situaciones legales que puedan impedir o restringir esta transmisión.
        </p>

        <h3 style="text-align: center; font-size: 20px; margin-top: 40px;">FIRMAS</h3>

        <div class="firma" style="margin-top: 40px;">
            <div style="float: left; width: 45%; text-align: center;">
                F.________________________________________<br/>
                <strong style="font-size: 18px;">{{ $paja->BitacoraRegistroActual()->residente->nombre_completo }}</strong><br/>
                <em>Adquiriente</em>
            </div>

            <div style="float: right; width: 45%; text-align: center;">
                F.________________________________________<br/>
                <strong style="font-size: 18px;">{{ $paja->BitacoraRegistroAnterior()->residente->nombre_completo }}</strong><br/>
                <em>Heredante</em>
            </div>
        </div>

        <div class="datos-administrador" style="margin-top: 60px; text-align: center;">
            F.________________________________________<br/>
            <strong style="font-size: 18px;">{{ $paja->BitacoraRegistroActual()->userTransacciona->nombre_completo }}</strong><br/>
            <em>Representante del COCODE</em>
        </div>

        <div id="fecha-impresion" style="text-align: center; margin-top: 40px; margin-bottom: 10px; padding: 10px;">
            Guastatoya, El Progreso, <span id="fechaActual">{{ \Carbon\Carbon::now()->format('d/m/y H:i') }}</span>
        </div>
    </section>
</main>

</body>
</html>
