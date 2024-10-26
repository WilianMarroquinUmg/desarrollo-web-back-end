<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Compra de Paja de Agua</title>
</head>
<body>
<header>
    <h1 style="text-align: center; font-family: 'Times New Roman', serif; font-size: 32px;">
        CONTRATO DE COMPRA DE PAJA DE AGUA
    </h1>
</header>

<main>
    <section style="margin: 40px; font-family: 'Times New Roman', serif; font-size: 18px; line-height: 1.6;">
        <h2 style="text-align: center; font-size: 24px;">DECLARACIONES</h2>

        <p style="margin-top: 20px;">
            I. El Sr. {{ $paja->BitacoraRegistroAnterior()->residente->nombre_completo }} declara ser propietario de la paja de agua con el número {{ $paja->correlativo }}, ubicada en {{ $paja->BitacoraRegistroAnterior()->direccion->nombre }}. La legitimidad de esta operación está acreditada mediante el documento emitido el {{ $paja->BitacoraRegistroAnterior()->fecha_registro }}, avalado por el COCODE comunitario, representado por el Sr. {{ $paja->BitacoraRegistroAnterior()->userTransacciona->nombre_completo }}.
        </p>

        <p style="margin-top: 20px;">
            II. El Sr. {{ $paja->BitacoraRegistroActual()->residente->nombre_completo }} declara aceptar la compra de la mencionada paja de agua, ahora registrada en {{ $paja->BitacoraRegistroActual()->direccion->nombre }}, y manifiesta que realiza esta adquisición con pleno conocimiento de las declaraciones previas.
        </p>

        <h2 style="text-align: center; font-size: 24px; margin-top: 40px;">CLÁUSULAS</h2>

        <p style="margin-top: 20px;">
            1. El comprador se compromete a cumplir con las normativas vigentes establecidas por la comunidad "El Naranjo" respecto al uso, mantenimiento y disposición de la paja de agua.
        </p>

        <p style="margin-top: 20px;">
            2. El vendedor garantiza que la paja de agua se encuentra libre de cualquier gravamen, obligación o situación legal que impida o restrinja su libre venta.
        </p>

        <h3 style="text-align: center; font-size: 20px; margin-top: 40px;">FIRMAS</h3>

        <div class="firma" style="margin-top: 40px;">
            <div style="float: left; width: 45%; text-align: center;">
                F.________________________________________<br/>
                <strong style="font-size: 18px;">{{ $paja->BitacoraRegistroActual()->residente->nombre_completo }}</strong><br/>
                <em>Comprador</em>
            </div>

            <div style="float: right; width: 45%; text-align: center;">
                F.________________________________________<br/>
                <strong style="font-size: 18px;">{{ $paja->BitacoraRegistroAnterior()->residente->nombre_completo }}</strong><br/>
                <em>Vendedor</em>
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
