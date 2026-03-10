<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    /**
     * Display a listing of registrations (Admin).
     */
    public function index()
    {
        $registrations = Registration::latest()->paginate(20);
        return view('admin.registrations.index', compact('registrations'));
    }

    public function create()
    {
        return view('registrations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_name' => 'required|string|max:255',
            'child_name' => 'required|string|max:255',
            'child_birth_date' => 'required|date',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $registration = Registration::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Inscription enregistrée avec succès. Nous vous contacterons bientôt.'
            ]);
        }

        return back()->with('success', 'Inscription enregistrée.');
    }

    /**
     * Update the registration status.
     */
    public function update(Request $request, string $id)
    {
        $registration = Registration::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|string|in:pending,approved,rejected',
        ]);

        $registration->update($validated);

        return back()->with('success', 'Statut de l\'inscription mis à jour.');
    }

    /**
     * Remove the registration.
     */
    public function destroy(string $id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return back()->with('success', 'Inscription supprimée.');
    }
}
