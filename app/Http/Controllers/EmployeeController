<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Affiche une liste d'employés
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider la demande
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => 'required|string|min:8',
            'employee_number' => 'required|string|unique:employees',
            'job_title' => 'required|string|max:255',
        ]);

        // Créer et enregistrer l'employé
        $employee = Employee::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Chiffrement du mot de passe
            'employee_number' => $validated['employee_number'],
            'job_title' => $validated['job_title'],
        ]);

        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    // Affiche un employé spécifique
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    // Affiche le formulaire d'édition pour un employé
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    // Met à jour un employé existant dans la base de données
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'employee_number' => 'required|string|unique:employees,employee_number,' . $employee->id,
            'job_title' => 'required|string|max:255',
        ]);

        // Met à jour les informations de l'employé
        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employé mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Employee  $employee
     * @return \Illuminate\Http\Response
     */
    // Supprime un employé de la base de données
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employé supprimé avec succès.');
    }
}
