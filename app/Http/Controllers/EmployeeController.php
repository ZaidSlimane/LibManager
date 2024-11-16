<?php

namespace App\Http\Controllers;

use App\Facades\EmployeeFacade;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = EmployeeFacade::getAllEmployees();
        return response()->json($employees);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => 'required|string|min:8',
            'employee_number' => 'required|string|unique:employees',
            'job_title' => 'required|string|max:255',
        ]);

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

        $employee = EmployeeFacade::updateEmployee($employee, $validated);

        return response()->json($employee);
    }

    public function destroy(Employee $employee)
    {
        EmployeeFacade::deleteEmployee($employee);

        return response()->json(['success' => 'Employee deleted successfully.']);
    }
    public function show($id)
    {
        $employee = EmployeeFacade::getEmployeeById($id);
        return response()->json($employee);
    }
}
