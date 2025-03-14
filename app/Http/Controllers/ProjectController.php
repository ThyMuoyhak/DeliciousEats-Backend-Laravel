<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // Display the projects list
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    // Show the form for adding a new project
    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Save the data to the database (excluding _token)
        Project::create($request->only(['name', 'description', 'status', 'start_date', 'end_date']));

        // Redirect to the projects list page
        return redirect()->route('projects.index')->with('success', 'Project added successfully!');
    }
}
