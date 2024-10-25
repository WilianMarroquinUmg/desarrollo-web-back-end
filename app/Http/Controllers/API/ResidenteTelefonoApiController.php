<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidenteTelefonoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() JSONResponse
    {
       $residenteTelefonos = ResidenteTelefono::all();

        return $this->sendResponse($residenteTelefonos->toArray(), 'ResidenteTelefonos obtenidos con exito');
    }

    public function create()
    {

    }


    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
