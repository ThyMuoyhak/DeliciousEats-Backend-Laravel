<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Display the messages list
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    // Show the form for composing a new message
    public function create()
    {
        return view('messages.create');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the data to the database
        Message::create($request->only(['to', 'subject', 'message']));

        // Redirect to the messages list page
        return redirect()->route('messages.index')->with('success', 'Message sent successfully!');
    }
}