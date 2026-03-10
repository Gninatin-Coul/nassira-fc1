@props(['player'])

<div 
    class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl max-w-sm"
    x-data="{ tab: 'bio' }"
>
    <!-- Header / Player Photo -->
    <div class="relative h-64 bg-foot-violet flex items-center justify-center">
        @if(isset($player->photo_url) && $player->photo_url)
            <img src="{{ $player->photo_url }}" alt="{{ $player->first_name }} {{ $player->last_name }}" class="object-cover w-full h-full opacity-90">
        @else
            <!-- Placeholder if no photo -->
            <svg class="w-24 h-24 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        @endif
        
        <!-- Category Badge -->
        <div class="absolute top-4 right-4 bg-foot-yellow text-foot-violet text-xs font-bold px-3 py-1 rounded-full shadow-sm">
            {{ $player->category->name ?? 'N/A' }}
        </div>
        
        <!-- Position Overlay -->
        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-foot-violet/90 to-transparent p-4">
            <h3 class="text-2xl font-bold text-foot-yellow">{{ $player->first_name }} {{ $player->last_name }}</h3>
            <p class="text-white text-sm opacity-90">{{ $player->position }}</p>
        </div>
    </div>

    <!-- Tabs Navigation (Alpine.js) -->
    <div class="flex border-b border-gray-200">
        <button 
            @click="tab = 'bio'" 
            :class="{ 'border-foot-yellow text-foot-violet': tab === 'bio', 'border-transparent text-gray-500 hover:text-gray-700': tab !== 'bio' }"
            class="flex-1 py-3 text-sm font-semibold text-center border-b-2 transition-colors focus:outline-none"
        >
            Bio
        </button>
        <button 
            @click="tab = 'stats'" 
            :class="{ 'border-foot-yellow text-foot-violet': tab === 'stats', 'border-transparent text-gray-500 hover:text-gray-700': tab !== 'stats' }"
            class="flex-1 py-3 text-sm font-semibold text-center border-b-2 transition-colors focus:outline-none"
        >
            Stats
        </button>
        <button 
            @click="tab = 'galerie'" 
            :class="{ 'border-foot-yellow text-foot-violet': tab === 'galerie', 'border-transparent text-gray-500 hover:text-gray-700': tab !== 'galerie' }"
            class="flex-1 py-3 text-sm font-semibold text-center border-b-2 transition-colors focus:outline-none"
        >
            Galerie
        </button>
    </div>

    <!-- Tabs Content -->
    <div class="p-6">
        <!-- Bio Tab -->
        <div x-show="tab === 'bio'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0">
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-500 text-sm">Âge</span>
                    <span class="font-semibold text-gray-800">
                        {{ $player->birth_date ? \Carbon\Carbon::parse($player->birth_date)->age . ' ans' : 'N/C' }}
                    </span>
                </div>
                <div>
                    <span class="block text-gray-500 text-sm mb-1">À propos</span>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        {{ $player->bio ?? 'Aucune biographie disponible pour ce joueur.' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Stats Tab -->
        <div x-show="tab === 'stats'" style="display: none;" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0">
            <ul class="space-y-4">
                <li class="flex items-center justify-between">
                    <span class="text-gray-600">Matchs joués</span>
                    <span class="font-bold text-foot-violet bg-foot-violet/10 px-3 py-1 rounded-md">0</span>
                </li>
                <li class="flex items-center justify-between">
                    <span class="text-gray-600">Buts marqués</span>
                    <span class="font-bold text-foot-violet bg-foot-violet/10 px-3 py-1 rounded-md">0</span>
                </li>
                <li class="flex items-center justify-between">
                    <span class="text-gray-600">Passes décisives</span>
                    <span class="font-bold text-foot-violet bg-foot-violet/10 px-3 py-1 rounded-md">0</span>
                </li>
            </ul>
        </div>

        <!-- Galerie Tab -->
        <div x-show="tab === 'galerie'" style="display: none;" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0">
            <div class="grid grid-cols-2 gap-2">
                <!-- Mock images for layout demo -->
                <div class="aspect-square bg-gray-200 rounded-lg overflow-hidden flex items-center justify-center text-gray-400 text-xs">Photo 1</div>
                <div class="aspect-square bg-gray-200 rounded-lg overflow-hidden flex items-center justify-center text-gray-400 text-xs">Photo 2</div>
                <div class="aspect-square bg-gray-200 rounded-lg overflow-hidden flex items-center justify-center text-gray-400 text-xs">Photo 3</div>
                <div class="aspect-square bg-gray-200 rounded-lg overflow-hidden flex items-center justify-center text-gray-400 text-xs">Photo 4</div>
            </div>
        </div>
    </div>
</div>
