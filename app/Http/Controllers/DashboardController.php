<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
{
    // Fetch paginated employees (10 per page)
    $employees = Employee::paginate(10);

    // Fetch stats for the dashboard
    $totalEmployees = Employee::count();
    $activeEmployees = Employee::where('status', 'Active')->count();
    $onLeaveEmployees = Employee::where('status', 'On Leave')->count();

    // Pass the data to the view
    return view('dashboard', compact('employees', 'totalEmployees', 'activeEmployees', 'onLeaveEmployees'));
}

}
