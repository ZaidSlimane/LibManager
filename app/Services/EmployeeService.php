<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{
    public function createEmployee(array $data)
    {
        // Créer un employé avec les données fournies
        return Employee::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'employee_number' => $data['employee_number'],
            'job_title' => $data['job_title'],
        ]);
    }

    public function updateEmployee(Employee $employee, array $data)
    {
        // Met à jour les informations de l'employé
        $employee->update($data);
        return $employee;
    }

    public function deleteEmployee(Employee $employee)
    {
        // Supprime l'employé de la base de données
        $employee->delete();
    }

    public function getAllEmployees()
    {
        return Employee::all();
    }
}
