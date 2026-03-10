<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->routeIs('admin.*')) {
            $players = \App\Models\Player::with('category')->latest()->paginate(20);
            return view('admin.players.index', compact('players'));
        }
        
        $players = \App\Models\Player::with('category')->get();
        $categories = \App\Models\Category::all();
        return view('players.index', compact('players', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.players.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo_url' => 'nullable|url',
        ]);

        \App\Models\Player::create($validated);

        return redirect()->route('admin.players.index')->with('success', 'Joueur ajouté avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = \App\Models\Player::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('admin.players.edit', compact('player', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $player = \App\Models\Player::findOrFail($id);
        
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo_url' => 'nullable|url',
        ]);

        $player->update($validated);

        return redirect()->route('admin.players.index')->with('success', 'Informations du joueur mises à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $player = \App\Models\Player::findOrFail($id);
        $player->delete();

        return redirect()->route('admin.players.index')->with('success', 'Joueur supprimé de la base de données.');
    }
}
