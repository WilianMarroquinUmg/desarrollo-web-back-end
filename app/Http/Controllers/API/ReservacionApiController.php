<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\Reservacion;
use App\Models\ServicioReservacion;
use Illuminate\Http\Request;

class ReservacionApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $reservation = Reservacion::all();

        return $this->sendResponse($reservation->toArray(), 'Reservaciones retrieved successfully');

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

        $reservation = Reservacion::create($input);

        return $this->sendResponse($reservation->toArray(), 'Reservacion saved successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $reservation = Reservacion::find($id);

        if (is_null($reservation)) {
            return $this->sendError('Reservacion not found');
        }

        return $this->sendResponse($reservation->toArray(), 'Reservacion retrieved successfully');
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

        $reservation = Reservacion::find($id);

        if (is_null($reservation)) {
            return $this->sendError('Reservacion not found');
        }

        $reservation->update($input);

        return $this->sendResponse($reservation->toArray(), 'Reservacion updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $reservation = Reservacion::find($id);

        if (is_null($reservation)) {
            return $this->sendError('Reservacion not found');
        }

        $reservation->delete();

        return $this->sendResponse([], 'Reservacion deleted successfully');

    }
}
