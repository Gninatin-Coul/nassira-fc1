<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $messages = \App\Models\ContactMessage::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\ContactMessage::create($validated);

        return back()->with('success', 'Votre message a été envoyé avec succès.');
    }

    /**
     * Mark a message as read.
     */
    public function read(string $id)
    {
        $message = \App\Models\ContactMessage::findOrFail($id);
        $message->update(['is_read' => true]);

        return back()->with('success', 'Message marqué comme lu.');
    }
}
