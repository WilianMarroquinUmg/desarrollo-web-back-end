<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResidenteController extends Controller
{
    /**
     * Mostrar una lista de los recursos.
     */
    public function index()
    {
        // Aquí se obtienen y retornan todos los residentes
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create()
    {
        // Aquí mostrarías un formulario para crear un nuevo residente (si es una aplicación web)
    }

    /**
     * Almacenar un recurso recién creado en la base de datos.
     */
    public function store(Request $request)
    {
        // Aquí validarías y almacenarías un nuevo residente en la base de datos
    }

    /**
     * Mostrar un recurso específico.
     */
    public function show($id)
    {
        // Aquí obtienes y muestras un residente por su ID
    }

    /**
     * Mostrar el formulario para editar un recurso existente.
     */
    public function edit($id)
    {
        // Aquí mostrarías un formulario para editar un residente existente (si es una aplicación web)
    }

    /**
     * Actualizar un recurso existente en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Aquí actualizarías los datos de un residente existente
    }

    /**
     * Eliminar un recurso específico de la base de datos.
     */
    public function destroy($id)
    {
        // Aquí eliminarías un residente de la base de datos
    }
}
