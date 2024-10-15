<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\Direccion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DireccionApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {

        $direcciones = Direccion::all();

        return $this->sendResponse($direcciones->toArray(), 'Direcciones obtenidas con exito');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input = $request->all();

        $direccion = Direccion::create($input);

        return $this->sendResponse($direccion->toArray(), 'Direccion guardada con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $direccion = Direccion::find($id);

        if (empty($direccion)) {
            return $this->sendError('Direccion no encontrada');
        }

        return $this->sendResponse($direccion->toArray(), 'Direccion obtenida con exito');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

            $input = $request->all();

            $direccion = Direccion::find($id);

            if (empty($direccion)) {
                return $this->sendError('Direccion no encontrada');
            }

            $direccion->fill($input);
            $direccion->save();

            return $this->sendResponse($direccion->toArray(), 'Direccion actualizada con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $direccion = Direccion::find($id);

        if (empty($direccion)) {
            return $this->sendError('Direccion no encontrada');
        }

        $direccion->delete();

        return $this->sendResponse([], 'Direccion eliminada con exito!');

    }
}
