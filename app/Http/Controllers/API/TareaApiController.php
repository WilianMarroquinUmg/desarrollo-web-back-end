<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Mail\MiCorreo;
use App\Models\Tarea;
use App\Models\TareaEstado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TareaApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tar = Tarea::with([
            'estado',
            'prioridad',
            'tipo',
            'recordatorio',
        ])->orderBy('updated_at', 'desc')
            ->get();

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

        $input['estado_id'] = TareaEstado::PENDIENTE;

        $input['user_id'] = $request->user()->id;

        $tar = Tarea::create($input);

        return $this->sendResponse($tar->toArray(), 'Tarea saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        /** @var Tarea $tar */
        $tar = Tarea::with([
            'prioridad',
            'tipo',
            'recordatorio',
        ])->find($id);

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

    public function cumplir($id)
    {
        /** @var Tarea $tar */
        $tar = Tarea::find($id);

        if (empty($tar)) {
            return $this->sendError('Tarea not found');
        }

        $tar->estado_id = TareaEstado::CUMPLIDA;
        $tar->save();

        return $this->sendResponse($tar->toArray(), 'Tarea cumplida');

    }


}
