<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\Residente;
use Illuminate\Http\Request;

class ResidenteApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $residentes = Residente::with('direccion')
        ->get();

        return $this->sendResponse($residentes->toArray(), 'Residentes retrieved successfully');

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

        $residente = Residente::create($input);

        return $this->sendResponse($residente->toArray(), 'Residente saved successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $residente = Residente::with('direccion')
        ->find($id);

        if (is_null($residente)) {
            return $this->sendError('Residente not found');
        }

        return $this->sendResponse($residente->toArray(), 'Residente retrieved successfully');

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

        $residente = Residente::find($id);

        if (is_null($residente)) {
            return $this->sendError('Residente not found');
        }

        $residente->update($input);

        return $this->sendResponse($residente->toArray(), 'Residente updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $residente = Residente::find($id);

        if (is_null($residente)) {
            return $this->sendError('Residente not found');
        }

        $residente->delete();

        return $this->sendResponse([], 'Residente deleted successfully');

    }
}
