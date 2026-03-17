<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the staff (Public).
     */
    public function index()
    {
        if (request()->routeIs('admin.*')) {
            $staff = Staff::orderBy('order')->orderBy('name')->paginate(20);
            return view('admin.staff.index', compact('staff'));
        }

        $dirigeants = Staff::where('type', 'dirigeant')->orderBy('order')->get();
        $personnel = Staff::where('type', 'personnel')->orderBy('order')->get();

        return view('staff.index', compact('dirigeants', 'personnel'));
    }

    /**
     * Show the form for creating a new staff member (Admin).
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created staff member in storage (Admin).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'type' => 'required|in:dirigeant,personnel',
            'photo' => 'nullable|image|max:2048',
            'bio' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo_url'] = $request->file('photo')->store('staff', 'public');
        }

        Staff::create($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Membre du staff ajouté avec succès.');
    }

    /**
     * Show the form for editing the specified staff member (Admin).
     */
    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * Update the specified staff member in storage (Admin).
     */
    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'type' => 'required|in:dirigeant,personnel',
            'photo' => 'nullable|image|max:2048',
            'bio' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo_url'] = $request->file('photo')->store('staff', 'public');
        }

        $staff->update($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Membre du staff mis à jour.');
    }

    /**
     * Remove the specified staff member from storage (Admin).
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('admin.staff.index')->with('success', 'Membre du staff supprimé.');
    }
}
