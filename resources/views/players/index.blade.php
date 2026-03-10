<x-app-layout>
    <x-slot:title>
        Effectif - Nassira FC
    </x-slot>

    <!-- Header Section -->
    <div class="bg-foot-violet text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-foot-yellow mb-4">Notre Effectif</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Découvrez l'ensemble des joueurs évoluant au sein de notre centre de formation. Filtrez par catégorie ou position pour trouver nos pépites.
            </p>
        </div>
    </div>

    <!-- Players Grid Section -->
    <div class="py-12 bg-gray-50 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ filterCategory: 'all', filterPosition: 'all' }">
        
        <!-- Filters -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 space-y-4 md:space-y-0 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center space-x-4">
                <span class="text-gray-500 font-medium">Filtrer par :</span>
                <select x-model="filterCategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-foot-violet focus:border-foot-violet block p-2.5">
                    <option value="all">Toutes les catégories</option>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endif
                </select>
                <select x-model="filterPosition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-foot-violet focus:border-foot-violet block p-2.5">
                    <option value="all">Toutes les positions</option>
                    <option value="Gardien">Gardien</option>
                    <option value="Défenseur">Défenseur</option>
                    <option value="Milieu">Milieu</option>
                    <option value="Attaquant">Attaquant</option>
                </select>
            </div>
            
            <div class="text-sm text-gray-500">
                <span class="font-bold text-foot-violet">{{ isset($players) ? $players->count() : 0 }}</span> joueurs trouvés
            </div>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @if(isset($players) && $players->count() > 0)
                @foreach($players as $player)
                    <!-- We pass attributes to Alpine to handle filtering -->
                    <div x-show="(filterCategory === 'all' || filterCategory == '{{ $player->category_id }}') && (filterPosition === 'all' || filterPosition == '{{ $player->position }}')"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                    >
                        <x-player-card :player="$player" />
                    </div>
                @endforeach
            @else
                <div class="col-span-4 text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Aucun joueur</h3>
                    <p class="text-gray-500">L'effectif n'a pas encore été renseigné.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
