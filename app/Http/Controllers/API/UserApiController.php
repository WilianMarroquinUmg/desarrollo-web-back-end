<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $users = User::query();

        if ($request->primer_nombre) {
            $users->where('primer_nombre', 'like', '%' . $request->name . '%');
        }
        if ($request->segundo_nombre) {
            $users->where('segundo_nombre', 'like', '%' . $request->name . '%');
        }
        if ($request->primer_apellido) {
            $users->where('primer_apellido', 'like', '%' . $request->name . '%');
        }
        if ($request->segundo_apellido) {
            $users->where('segundo_apellido', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $users->where('email', 'like', '%' . $request->email . '%');
        }

        return $this->sendResponse($users->get(), 'Usuarios Listados Exitosamente');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {

        $validatedData = $request->all();

        $validatedData['password'] = Hash::make($validatedData['password']);

        if (User::create($validatedData)) {

            return response()->json([
                'message' => 'Usuario Creado Exitosamente '
            ], 201);

        }

        return response()->json([
            'message', 'Error al crear el usuario'
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        //
    }
}
