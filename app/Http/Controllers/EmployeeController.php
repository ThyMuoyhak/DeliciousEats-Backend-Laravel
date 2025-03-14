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

   
}
