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

Route::resource('residentes', ResidenteController::class);
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residente;

class ResidenteController extends Controller
{
    // Método para listar todos los residentes
    public function index()
    {
        $residentes = Residente::all();
        return response()->json($residentes);
    }

    // Mostrar el formulario de creación (en caso de una app web)
    public function create()
    {
        //
    }

    // Almacenar un nuevo residente
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
            'direccion' => 'required|string|max:255',
        ]);

        $residente = Residente::create($request->all());

        return response()->json($residente, 201);
    }

    // Mostrar un residente específico
    public function show($id)
    {
        $residente = Residente::find($id);

        if (!$residente) {
            return response()->json(['error' => 'Residente no encontrado'], 404);
        }

        return response()->json($residente);
    }

    // Mostrar el formulario de edición (en caso de una app web)
    public function edit($id)
    {
        //
    }

    // Actualizar un residente
    public function update(Request $request, $id)
    {
        $residente = Residente::find($id);

        if (!$residente) {
            return response()->json(['error' => 'Residente no encontrado'], 404);
        }

        $residente->update($request->all());

        return response()->json($residente);
    }

    // Eliminar un residente
    public function destroy($id)
    {
        $residente = Residente::find($id);

        if (!$residente) {
            return response()->json(['error' => 'Residente no encontrado'], 404);
        }

        $residente->delete();

        return response()->json(['message' => 'Residente eliminado con éxito']);
    }
}
