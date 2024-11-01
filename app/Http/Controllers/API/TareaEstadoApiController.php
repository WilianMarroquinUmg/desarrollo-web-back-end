<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\TareaEstado;
use Illuminate\Http\Request;

class TareaEstadoApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tareaEstados = TareaEstado::all();

        return $this->sendResponse($tareaEstados->toArray(), 'Tarea Estados retrieved successfully');

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

        $tareaEstado = TareaEstado::create($input);

        return $this->sendResponse($tareaEstado->toArray(), 'Tarea Estado saved successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        /** @var TareaEstado $tareaEstado */
        $tareaEstado = TareaEstado::find($id);

        if (empty($tareaEstado)) {
            return $this->sendError('Tarea Estado not found');
        }

        return $this->sendResponse($tareaEstado->toArray(), 'Tarea Estado retrieved successfully');

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

        $input = $request->all();

        /** @var TareaEstado $tareaEstado */
        $tareaEstado = TareaEstado::find($id);

        if (empty($tareaEstado)) {
            return $this->sendError('Tarea Estado not found');
        }

        $tareaEstado->fill($input);
        $tareaEstado->save();

        return $this->sendResponse($tareaEstado->toArray(), 'TareaEstado updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

            /** @var TareaEstado $tareaEstado */
            $tareaEstado = TareaEstado::find($id);

            if (empty($tareaEstado)) {
                return $this->sendError('Tarea Estado not found');
            }

            $tareaEstado->delete();

            return $this->sendResponse([], 'Tarea Estado deleted successfully');

    }
}
