<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\PajaAgua;
use App\Models\Residente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

            $correlativo = "Paja-" . Carbon::now()->format('Y') . "1";

        } else {

            $correlativo = "Paja-" . Carbon::now()->format('Y') . "-" . ($ultimaPajaAgua->id + 1);

        }

        return $correlativo;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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


}
