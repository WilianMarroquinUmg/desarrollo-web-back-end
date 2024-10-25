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
        $residenteTelefono = ResidenteTelefono::find($id);

        if (empty($residenteTelefono)) {
            return $this->sendError('ResidenteTelefono no encontrado');
        }

        return $this->sendResponse($residenteTelefono->toArray(), 'ResidenteTelefono obtenido con exito');
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $residenteTelefono = ResidenteTelefono::find($id);

        if (empty($residenteTelefono)) {
            return $this->sendError('ResidenteTelefono no encontrado');
        }

        $residenteTelefono->fill($input);
        $residenteTelefono->save();

        return $this->sendResponse($residenteTelefono->toArray(), 'ResidenteTelefono actualizado con exito');
    }

    public function destroy(string $id)
    {

    }
}
