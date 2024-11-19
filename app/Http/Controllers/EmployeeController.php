<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Departament;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Mostrar formulario para crear un nuevo empleado.
     */
    public function create()
    {
        $departments = Departament::all();

        // Validar que existan departamentos
        if ($departments->isEmpty()) {
            return redirect()->back()->withErrors('No departments found. Please add departments first.');
        }

        return view('employees.create', compact('departments'));
    }

    /**
     * Almacenar un nuevo empleado en la base de datos.
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos
            $request->validate([
                'NIF' => 'required|unique:employees,NIF|max:20',
                'tno' => 'required|max:15',
                'num_hijos' => 'required|integer|min:0',
                'departament_id' => 'required|exists:departaments,id',
            ]);

            // Guardar el empleado
            Employee::create($request->all());

            return redirect()->route('employees.create')->with('success', 'añadido.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
