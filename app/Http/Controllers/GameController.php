<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->routeIs('admin.*')) {
            $games = \App\Models\Game::latest()->paginate(20);
            return view('admin.games.index', compact('games'));
        }

        $games = \App\Models\Game::whereDate('match_date', '>=', now())
            ->orderBy('match_date', 'asc')
            ->get();
        $pastGames = \App\Models\Game::whereDate('match_date', '<', now())
            ->orderBy('match_date', 'desc')
            ->take(5)
            ->get();

        return view('games.index', compact('games', 'pastGames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'opponent' => 'required|string|max:255',
            'match_date' => 'required|date',
            'home_score' => 'nullable|integer|min:0',
            'away_score' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:255',
        ]);

        \App\Models\Game::create($validated);

        return redirect()->route('admin.games.index')->with('success', 'Match enregistré avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $game = \App\Models\Game::findOrFail($id);
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $game = \App\Models\Game::findOrFail($id);

        $validated = $request->validate([
            'opponent' => 'required|string|max:255',
            'match_date' => 'required|date',
            'home_score' => 'nullable|integer|min:0',
            'away_score' => 'nullable|integer|min:0',
            'location' => 'nullable|string|max:255',
        ]);

        $game->update($validated);

        return redirect()->route('admin.games.index')->with('success', 'Match mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game = \App\Models\Game::findOrFail($id);
        $game->delete();

        return redirect()->route('admin.games.index')->with('success', 'Match supprimé.');
    }
}
