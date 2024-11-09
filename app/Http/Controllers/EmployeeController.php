<?php

namespace App\Http\Controllers;

use App\Facades\EmployeeFacade;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => 'required|string|min:8',
            'employee_number' => 'required|string|unique:employees',
            'job_title' => 'required|string|max:255',
        ]);

        // Utiliser la façade pour créer l'employé
        $employee = EmployeeFacade::createEmployee($validated);

        return response()->json($employee);
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'employee_number' => 'required|string|unique:employees,employee_number,' . $employee->id,
            'job_title' => 'required|string|max:255',
        ]);

        // Utiliser la façade pour mettre à jour l'employé
        $employee = EmployeeFacade::updateEmployee($employee, $validated);

        return redirect()->route('employees.index')->with('success', 'Employé mis à jour avec succès.');
    }

    public function destroy(Employee $employee)
    {
        // Utiliser la façade pour supprimer l'employé
        EmployeeFacade::deleteEmployee($employee);

        return redirect()->route('employees.index')->with('success', 'Employé supprimé avec succès.');
    }
}
