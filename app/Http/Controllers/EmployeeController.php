<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
{
    // Fetch employees with pagination (10 records per page)
    $employees = Employee::paginate(10);
    $search = $request->input('search');
        $department = $request->input('department');
        $status = $request->input('status');
        $sort = $request->input('sort', 'name');
        $direction = $request->input('direction', 'asc');
    
        // Build the query for employees
        $query = Employee::query()
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('position', 'like', "%{$search}%")
                      ->orWhere('department', 'like', "%{$search}%");
                });
            })
            ->when($department && $department !== 'All Departments', function ($query) use ($department) {
                return $query->where('department', $department);
            })
            ->when($status && $status !== 'All Status', function ($query) use ($status) {
                return $query->where('status', $status);
            });
    
        // Get the total count of employees (with filters applied)
        $totalEmployees = $query->count();
    
        // Get the count of active employees (with filters applied)
        $activeEmployees = $query->clone()->where('status', 'Active')->count();
    
        // Get the count of on-leave employees (with filters applied)
        $onLeaveEmployees = $query->clone()->where('status', 'On Leave')->count();
    
        // Get employee counts by department for the chart
        $departmentCounts = Employee::query()
            ->groupBy('department')
            ->select('department', \DB::raw('count(*) as count'))
            ->pluck('count', 'department')
            ->toArray();
    
        // Get paginated employees
        $employees = $query->orderBy($sort, $direction)
            ->paginate(10)
            ->withQueryString();
    
        // Get unique departments for filter dropdown
        $departments = Employee::select('department')->distinct()->orderBy('department')->pluck('department');

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
