<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch all employees from the database
        $employees = Employee::all();

        // Pass the employees data to the view
        return view('employee', compact('employees'));
    }

    public function create()
    {
        return view('employees.create'); // Create a view for the form
    }

    

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Save the data to the database (excluding _token)
        Employee::create($request->only(['name', 'position', 'department', 'status']));

        // Redirect to the employee list page
        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'status' => 'required|string|in:Active,Inactive,On Leave',
        ]);

        // Update employee with validated data
        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }


    public function destroy(Employee $employee)
    {
        // Delete the employee record
        $employee->delete();

        // Redirect back with a success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }


   
}
