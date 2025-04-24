<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionContrller extends Controller
{
    /**
     * Display a listing of the positions.
     */
    public function index()
    {
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new position.
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created position in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Position::create($request->only('name'));

        return redirect()->route('positions.index')->with('success', 'Position created successfully.');
    }

    /**
     * Show the form for editing the specified position.
     */
    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
    }

    /**
     * Update the specified position in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $position = Position::findOrFail($id);
        $position->update($request->only('name'));

        return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
    }

    /**
     * Remove the specified position from storage.
     */
    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Position deleted successfully.');
    }
}