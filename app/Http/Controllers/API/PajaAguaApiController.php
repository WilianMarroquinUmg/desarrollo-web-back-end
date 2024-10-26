<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\PajaAgua;
use App\Models\Residente;

use App\Models\TipoAdquisicion;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

class PajaAguaApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pajas = PajaAgua::with('residente')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MIN(id)'))
                    ->from('paja_aguas')
                    ->groupBy('residente_id');
            })
            ->get();

        return $this->sendResponse($pajas->toArray(), 'Pajas de agua recuperadas correctamente');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

            DB::beginTransaction();

            $pajaAgua = PajaAgua::create([
                'correlativo' => $this->correlativo(),
                'residente_id' => $request->residente_id,
            ]);

            $pajaAgua->bitacoras()
                ->create([
                    'fecha_registro' => Carbon::now(),
                    'residente_id' => $pajaAgua->residente_id,
                    'transaccion_id' => $request->tipo_transaccion_id,
                    'direccion_id' => $request->direccion_id,
                    'user_transacciona_id' => auth()->user()->id,
                    'observaciones' => $request->observaciones,
                ]);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            return $this->sendError($e);

        }

        return $this->sendResponse($pajaAgua, 'Paja de agua creada correctamente');

    }

    public function correlativo()
    {
        $ultimaPajaAgua = PajaAgua::latest()->first();

        if (!$ultimaPajaAgua) {

            $correlativo = "Paja-" . Carbon::now()->format('Y') . "-1";

        } else {

            $correlativo = "Paja-" . Carbon::now()->format('Y') . "-" . ($ultimaPajaAgua->id + 1);

        }

        return $correlativo;

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    public function getDetallesForResidente($id)
    {

        $residente = Residente::with([
            'pajaAguas.bitacoras.transaccion',
            'pajaAguas.bitacoras.direccion',
            'pajaAguas.bitacoras.residente'
        ])->find($id);

        if (!$residente) {

            return $this->sendError('Residente no encontrado');

        }

        return $this->sendResponse($residente->toArray(), 'Detalles de paja de agua recuperados correctamente');

    }

    public function trasladarResidente(Request $request)
    {

        try {

            DB::beginTransaction();

            $pajaAgua = PajaAgua::find($request->paja_agua_id);

            $pajaAgua->update([
                'residente_id' => $request->nuevo_residente_id,
            ]);

            $pajaAgua->bitacoras()
                ->create([
                    'fecha_registro' => Carbon::now(),
                    'residente_id' => $request->nuevo_residente_id,
                    'transaccion_id' => $request->tipo_transaccion_id,
                    'direccion_id' => $request->direccion_id,
                    'user_transacciona_id' => auth()->user()->id,
                    'observaciones' => $request->observaciones,
                ]);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            return $this->sendError($e);

        }

        return $this->sendResponse($pajaAgua, 'Paja de agua trasladada correctamente');

    }

    public function getPajaAguasFromResidente($id)
    {

        $pajaAguas = PajaAgua::with('bitacoras')
            ->where('residente_id', $id)
            ->get();

        if (!$pajaAguas) {

            return $this->sendError('Pajas de agua no encontradas');

        }

        return $this->sendResponse($pajaAguas, 'Pajas de agua recuperadas correctamente');

    }

    public function getCertificado($id)
    {
        /**
         * @var PajaAgua $pajaAgua
         */
        $pajaAgua = PajaAgua::find($id);

        if (!$pajaAgua) {
            return response()->json(['error' => 'Paja de agua no encontrada'], 404);
        }

        $directory = storage_path('app/public/certificados');
        $filename = 'certificado_' . $pajaAgua->BitacoraRegistroActual()->id . '.pdf';
        $filePath = $directory . '/' . $filename;

        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        if ($pajaAgua->BitacoraRegistroActual()->transaccion_id == TipoAdquisicion::COMPRA) {

            Pdf::view('pdf.CertificadoCompra', ['paja' => $pajaAgua])->save($filePath);

        }

        if ($pajaAgua->BitacoraRegistroActual()->transaccion_id == TipoAdquisicion::HERENCIA) {

            Pdf::view('pdf.CertificadoHerencia', ['paja' => $pajaAgua])->save($filePath);

        }

        if ($pajaAgua->BitacoraRegistroActual()->transaccion_id == TipoAdquisicion::DONACION) {

            Pdf::view('pdf.CertificadoDonacion', ['paja' => $pajaAgua])->save($filePath);

        }

        if ($pajaAgua->BitacoraRegistroActual()->transaccion_id == TipoAdquisicion::PRIMER_DUEÑO_TRABAJO_EN_SU_MOMENTO) {

            Pdf::view('pdf.CertificadoAdquisicion', ['paja' => $pajaAgua])->save($filePath);

        }


        $publicPath = Storage::url('public/certificados/' . $filename);

        return $this->sendResponse([$publicPath], 'Certificado generado correctamente');
    }


    public function getCertificadoOtro($id)
    {
        /**
         * @var PajaAgua $pajaAgua
         */
        $pajaAgua = PajaAgua::find($id);

        if (!$pajaAgua) {
            return response()->json(['error' => 'Paja de agua no encontrada'], 404);
        }

        $directory = storage_path('app/public/certificados');
        $filename = 'certificado_' . $pajaAgua->BitacoraRegistroActual()->id . '.pdf';
        $filePath = $directory . '/' . $filename;

        // Crear el directorio si no existe
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        // Configurar opciones de DomPDF
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        // Seleccionar la vista adecuada según el tipo de transacción
        $viewName = '';

        switch ($pajaAgua->BitacoraRegistroActual()->transaccion_id) {
            case TipoAdquisicion::COMPRA:
                $viewName = 'pdf.CertificadoCompra';
                break;
            case TipoAdquisicion::HERENCIA:
                $viewName = 'pdf.CertificadoHerencia';
                break;
            case TipoAdquisicion::DONACION:
                $viewName = 'pdf.CertificadoDonacion';
                break;
            case TipoAdquisicion::PRIMER_DUEÑO_TRABAJO_EN_SU_MOMENTO:
                $viewName = 'pdf.CertificadoAdquisicion';
                break;
            default:
                return response()->json(['error' => 'Transacción no válida'], 400);
        }

        // Cargar la vista y renderizar el HTML
        $html = view($viewName, ['paja' => $pajaAgua])->render();
        $dompdf->loadHtml($html);

        // (Opcional) Configurar el tamaño y la orientación del papel
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar el PDF
        $dompdf->render();

        // Guardar el PDF en el almacenamiento
        $pdfOutput = $dompdf->output();
        file_put_contents($filePath, $pdfOutput);

        // Obtener la URL pública del archivo guardado
        $publicPath = Storage::url('certificados/' . $filename);

        return $this->sendResponse([$publicPath], 'Certificado generado correctamente');
    }


}
