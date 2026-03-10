<x-admin-layout>
    <x-slot:title>Matchs</x-slot>
    <x-slot:header>Calendrier & Résultats</x-slot>

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Liste des Matchs</h2>
        <a href="{{ route('admin.games.create') }}" class="bg-foot-violet text-white px-4 py-2 rounded-lg font-bold hover:bg-gray-900 transition flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
            Nouveau Match
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-bold tracking-wider">
                    <tr>
                        <th class="py-4 px-6">Date</th>
                        <th class="py-4 px-6">Adversaire</th>
                        <th class="py-4 px-6">Score</th>
                        <th class="py-4 px-6">Lieu</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($games as $game)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-4 px-6 text-sm">
                                {{ \Carbon\Carbon::parse($game->match_date)->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-4 px-6 font-bold">
                                {{ $game->opponent }}
                            </td>
                            <td class="py-4 px-6">
                                @if($game->home_score !== null && $game->away_score !== null)
                                    <span class="px-3 py-1 bg-gray-100 rounded-lg font-black text-foot-violet">
                                        {{ $game->home_score }} - {{ $game->away_score }}
                                    </span>
                                @else
                                    <span class="text-gray-400 italic text-sm">À venir</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500">
                                {{ $game->location ?? 'Non précisé' }}
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.games.edit', $game) }}" class="text-blue-600 hover:underline text-sm font-bold">Modifier</a>
                                <form action="{{ route('admin.games.destroy', $game) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce match ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-bold">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-20 text-center text-gray-400 italic">Aucun match enregistré.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($games->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $games->links() }}
        </div>
        @endif
    </div>
</x-admin-layout>
