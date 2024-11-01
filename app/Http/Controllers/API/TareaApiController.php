<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tar = Tarea::all();

        return $this->sendResponse($tar->toArray(), 'Tareas retrieved successfully');

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

        $tar = Tarea::create($input);

        return $this->sendResponse($tar->toArray(), 'Tarea saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        /** @var Tarea $tar */
        $tar = Tarea::find($id);

        if (empty($tar)) {
            return $this->sendError('Tarea not found');
        }

        return $this->sendResponse($tar->toArray(), 'Tarea retrieved successfully');

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

        /** @var Tarea $tar */
        $tar = Tarea::find($id);

        if (empty($tar)) {
            return $this->sendError('Tarea not found');
        }

        $tar->fill($input);
        $tar->save();

        return $this->sendResponse($tar->toArray(), 'Tarea updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        /** @var Tarea $tar */
        $tar = Tarea::find($id);

        if (empty($tar)) {
            return $this->sendError('Tarea not found');
        }

        $tar->delete();

        return $this->sendResponse([], 'Tarea deleted successfully');

    }
}
