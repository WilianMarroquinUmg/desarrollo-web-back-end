<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\TipoAdquisicion;
use Illuminate\Http\Request;

class TipoAdquisicionApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tiposAdquisicion = TipoAdquisicion::all();

        return $this->sendResponse($tiposAdquisicion->toArray(), 'Tipos de adquisición recuperados con éxito');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input = $request->all();

        $tipoAdquisicion = TipoAdquisicion::create($input);

        return $this->sendResponse($tipoAdquisicion->toArray(), 'Tipo de adquisición guardado con éxito');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $tipoAdquisicion = TipoAdquisicion::find($id);

        if (empty($tipoAdquisicion)) {
            return $this->sendError('Tipo de adquisición no encontrado');
        }

        return $this->sendResponse($tipoAdquisicion->toArray(), 'Tipo de adquisición recuperado con éxito');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $input = $request->all();

        $tipoAdquisicion = TipoAdquisicion::find($id);

        if (empty($tipoAdquisicion)) {
            return $this->sendError('Tipo de adquisición no encontrado');
        }

        $tipoAdquisicion->fill($input);
        $tipoAdquisicion->save();

        return $this->sendResponse($tipoAdquisicion->toArray(), 'Tipo de adquisición actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $tipoAdquisicion = TipoAdquisicion::find($id);

        if (empty($tipoAdquisicion)) {
            return $this->sendError('Tipo de adquisición no encontrado');
        }

        $tipoAdquisicion->delete();

        return $this->sendResponse($tipoAdquisicion->toArray(), 'Tipo de adquisición eliminado con éxito');

    }
}
