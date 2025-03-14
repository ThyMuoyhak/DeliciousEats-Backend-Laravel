<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch all employees from the database
        $employees = Employee::all();

        // Pass the employees data to the view
        return view('dashboard', compact('employees'));
    }
}
