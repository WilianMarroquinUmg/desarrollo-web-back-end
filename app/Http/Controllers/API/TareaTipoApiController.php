<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\TareaTipo;
use Illuminate\Http\Request;

class TareaTipoApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tareaTipo = TareaTipo::all();

        return $this->sendResponse($tareaTipo, 'Tarea Tipos retrieved successfully');

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

        $tareaTipo = TareaTipo::create($input);

        return $this->sendResponse($tareaTipo, 'Tarea Tipo saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $tareaTipo = TareaTipo::find($id);

        if (empty($tareaTipo)) {
            return $this->sendError('Tarea Tipo not found');
        }

        return $this->sendResponse($tareaTipo, 'Tarea Tipo retrieved successfully');

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

        $tareaTipo = TareaTipo::find($id);

        if (empty($tareaTipo)) {
            return $this->sendError('Tarea Tipo not found');
        }

        $tareaTipo->fill($input);
        $tareaTipo->save();

        return $this->sendResponse($tareaTipo, 'Tarea Tipo updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $tareaTipo = TareaTipo::find($id);

        if (empty($tareaTipo)) {
            return $this->sendError('Tarea Tipo not found');
        }

        $tareaTipo->delete();

        return $this->sendResponse([], 'Tarea Tipo deleted successfully');

    }
}
