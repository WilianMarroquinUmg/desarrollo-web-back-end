<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\TipoServicio;
use Illuminate\Http\Request;

class TipoServicioApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tipoServicios = TipoServicio::all();

        return $this->sendResponse($tipoServicios->toArray(), 'Tipo Servicios retrieved successfully');

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

        $input = $request->all();

        $tipoServicio = TipoServicio::create($input);

        return $this->sendResponse($tipoServicio->toArray(), 'Tipo Servicio saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        /** @var TipoServicio $tipoServicio */
        $tipoServicio = TipoServicio::find($id);

        if (empty($tipoServicio)) {
            return $this->sendError('Tipo Servicio not found');
        }

        return $this->sendResponse($tipoServicio->toArray(), 'Tipo Servicio retrieved successfully');
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

        /** @var TipoServicio $tipoServicio */
        $tipoServicio = TipoServicio::find($id);

        if (empty($tipoServicio)) {
            return $this->sendError('Tipo Servicio not found');
        }

        $tipoServicio->fill($request->all());
        $tipoServicio->save();

        return $this->sendResponse($tipoServicio->toArray(), 'TipoServicio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        /** @var TipoServicio $tipoServicio */
        $tipoServicio = TipoServicio::find($id);

        if (empty($tipoServicio)) {
            return $this->sendError('Tipo Servicio not found');
        }

        $tipoServicio->delete();

        return $this->sendResponse([],'Tipo Servicio deleted successfully');
    }
}
