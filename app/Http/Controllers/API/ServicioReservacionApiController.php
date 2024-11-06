<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\ServicioReservacion;
use Illuminate\Http\Request;

class ServicioReservacionApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $servicioReservaciones = ServicioReservacion::all();

        return $this->sendResponse($servicioReservaciones->toArray(), 'Servicio Reservaciones retrieved successfully');

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

        $servicioReservacion = ServicioReservacion::create($input);

        return $this->sendResponse($servicioReservacion->toArray(), 'Servicio Reservacion saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servicioReservacion = ServicioReservacion::find($id);

        if (empty($servicioReservacion)) {
            return $this->sendError('Servicio Reservacion not found');
        }

        return $this->sendResponse($servicioReservacion->toArray(), 'Servicio Reservacion retrieved successfully');
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

        $servicioReservacion = ServicioReservacion::find($id);

        if (empty($servicioReservacion)) {
            return $this->sendError('Servicio Reservacion not found');
        }

        $servicioReservacion->fill($input);
        $servicioReservacion->save();

        return $this->sendResponse($servicioReservacion->toArray(), 'ServicioReservacion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $servicioReservacion = ServicioReservacion::find($id);

        if (empty($servicioReservacion)) {
            return $this->sendError('Servicio Reservacion not found');
        }

        $servicioReservacion->delete();

        return $this->sendResponse([], 'Servicio Reservacion deleted successfully');
    }
}
