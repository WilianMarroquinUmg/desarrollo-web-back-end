<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\TareaPrioridad;
use Illuminate\Http\Request;

class TareaPrioridadApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $tareaPrioridades = TareaPrioridad::all();

        return $this->sendResponse($tareaPrioridades->toArray(), 'Tarea Prioridades retrieved successfully');


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

        $tareaPrioridad = TareaPrioridad::create($input);

        return $this->sendResponse($tareaPrioridad->toArray(), 'Tarea Prioridad saved successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        /** @var TareaPrioridad $tareaPrioridad */
        $tareaPrioridad = TareaPrioridad::find($id);

        if (empty($tareaPrioridad)) {
            return $this->sendError('Tarea Prioridad not found');
        }

        return $this->sendResponse($tareaPrioridad->toArray(), 'Tarea Prioridad retrieved successfully');

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

        /** @var TareaPrioridad $tareaPrioridad */
        $tareaPrioridad = TareaPrioridad::find($id);

        if (empty($tareaPrioridad)) {
            return $this->sendError('Tarea Prioridad not found');
        }

        $tareaPrioridad->fill($input);
        $tareaPrioridad->save();

        return $this->sendResponse($tareaPrioridad->toArray(), 'TareaPrioridad updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        /** @var TareaPrioridad $tareaPrioridad */
        $tareaPrioridad = TareaPrioridad::find($id);

        if (empty($tareaPrioridad)) {
            return $this->sendError('Tarea Prioridad not found');
        }

        $tareaPrioridad->delete();

        return $this->sendResponse([], 'Tarea Prioridad deleted successfully');

    }
}
