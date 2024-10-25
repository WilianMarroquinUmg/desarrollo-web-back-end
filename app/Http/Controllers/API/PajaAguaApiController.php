<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\PajaAgua;
use App\Models\Residente;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

        // Definir el directorio y el nombre del archivo PDF
        $directory = storage_path('app/public/certificados');
        $filename = 'certificado_' . $pajaAgua->id . '.pdf';
        $filePath = $directory . '/' . $filename;

        // Crear el directorio si no existe
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true); // true para crear directorios anidados
        }

        Pdf::view('pdf.invoice')->save($filePath);

        $publicPath = Storage::url('public/certificados/' . $filename);

        return $this->sendResponse([$publicPath], 'Certificado generado correctamente');
    }



}