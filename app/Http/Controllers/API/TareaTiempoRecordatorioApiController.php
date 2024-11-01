<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\TareaTiempoRecordatorio;
use Illuminate\Http\Request;

class TareaTiempoRecordatorioApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareaTiempoRecodatorios = TareaTiempoRecordatorio::all();

        return $this->sendResponse($tareaTiempoRecodatorios, 'Tarea Tiempo Recordatorio retrieved successfully');

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

        $tareaTiempoRecodatorio = TareaTiempoRecordatorio::create($input);

        return $this->sendResponse($tareaTiempoRecodatorio, 'Tarea Tiempo Recordatorio saved successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tareaTiempoRecodatorio = TareaTiempoRecordatorio::find($id);

        if (is_null($tareaTiempoRecodatorio)) {
            return $this->sendError('Tarea Tiempo Recordatorio not found');
        }

        return $this->sendResponse($tareaTiempoRecodatorio, 'Tarea Tiempo Recordatorio retrieved successfully');
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

        $tareaTiempoRecodatorio = TareaTiempoRecordatorio::find($id);

        if (is_null($tareaTiempoRecodatorio)) {
            return $this->sendError('Tarea Tiempo Recordatorio not found');
        }

        $tareaTiempoRecodatorio->update($input);

        return $this->sendResponse($tareaTiempoRecodatorio, 'Tarea Tiempo Recordatorio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tareaTiempoRecodatorio = TareaTiempoRecordatorio::find($id);

        if (is_null($tareaTiempoRecodatorio)) {
            return $this->sendError('Tarea Tiempo Recordatorio not found');
        }

        $tareaTiempoRecodatorio->delete();

        return $this->sendResponse([], 'Tarea Tiempo Recordatorio deleted successfully');

    }
}
