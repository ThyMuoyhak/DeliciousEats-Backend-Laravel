<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
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
    
        // Pass variables to the view
        return view('dashboard', compact('employees', 'departments', 'search', 'department', 'status', 'sort', 'direction', 'totalEmployees', 'activeEmployees', 'onLeaveEmployees', 'departmentCounts'));
    }

}
