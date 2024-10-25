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

    public function store(Request $request)
    {
        input = $request->all();
        $residenteTelefono = ResidenteTelefono::create($input);
        return $this->sendResponse($residenteTelefono->toArray(), 'ResidenteTelefono guardado con exito');
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {

    }
}
