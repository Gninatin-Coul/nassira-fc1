<x-admin-layout>
    <x-slot:title>Nouveau Match</x-slot>
    <x-slot:header>Enregistrer un Match</x-slot>

    <div class="max-w-4xl bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100 p-8">
        <form action="{{ route('admin.games.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="opponent" class="block text-sm font-bold text-gray-700 mb-1">Adversaire</label>
                    <input type="text" name="opponent" id="opponent" value="{{ old('opponent') }}" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm"
                        placeholder="Ex: ASEC Mimosas">
                    @error('opponent') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="match_date" class="block text-sm font-bold text-gray-700 mb-1">Date et Heure</label>
                    <input type="datetime-local" name="match_date" id="match_date" value="{{ old('match_date') }}" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                    @error('match_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="home_score" class="block text-sm font-bold text-gray-700 mb-1">Score Nassira FC (optionnel)</label>
                    <input type="number" name="home_score" id="home_score" value="{{ old('home_score') }}" min="0"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                    @error('home_score') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="away_score" class="block text-sm font-bold text-gray-700 mb-1">Score Adversaire (optionnel)</label>
                    <input type="number" name="away_score" id="away_score" value="{{ old('away_score') }}" min="0"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                    @error('away_score') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="location" class="block text-sm font-bold text-gray-700 mb-1">Lieu du match</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm"
                    placeholder="Ex: Stade Municipal de Grand-Bassam">
                @error('location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.games.index') }}" class="px-4 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 transition">Annuler</a>
                <button type="submit" class="bg-foot-violet text-white px-6 py-2 rounded-lg font-bold hover:bg-gray-900 transition">
                    Enregistrer le match
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
