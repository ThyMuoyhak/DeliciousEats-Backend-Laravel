<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Display the reports list
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    // Show the form for generating a new report
    public function create()
    {
        return view('reports.create');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'generated_by' => 'required|string|max:255',
        ]);

        // Save the data to the database
        Report::create($request->only(['name', 'generated_by']));

        // Redirect to the reports list page
        return redirect()->route('reports.index')->with('success', 'Report generated successfully!');
    }

        // Show a report
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.show', compact('report'));
    }

    // Edit a report
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.edit', compact('report'));
    }

    // Update a report
    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->update($request->all());

        return redirect()->route('reports.index')->with('success', 'Report updated successfully');
    }

    // Delete a report
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Report deleted successfully');
    }

}
