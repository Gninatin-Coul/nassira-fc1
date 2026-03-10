<x-app-layout>
    <x-slot:title>
        Catégories - Nassira FC
    </x-slot>

    <!-- Header Section -->
    <div class="bg-foot-violet text-white py-16 border-b-8 border-foot-yellow relative overflow-hidden">
        <div class="absolute inset-0 bg-foot-violet/30 mix-blend-multiply"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Catégories Sportives</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Des poussins jusqu'aux espoirs, découvrez l'organisation de nos équipes et la structure de notre formation.
            </p>
        </div>
    </div>

    <!-- Categories Content -->
    <div class="py-16 bg-gray-50 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if(isset($categories) && $categories->count() > 0)
                @foreach($categories as $category)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden group hover:shadow-xl transition-shadow duration-300">
                        <div class="h-32 bg-foot-violet flex flex-col items-center justify-center p-6 relative overflow-hidden text-center text-white">
                            <!-- Background decoration -->
                            <svg class="absolute w-32 h-32 text-white/5 right-0 bottom-0 transform translate-x-10 translate-y-10 group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204..."></path></svg>
                            
                            <h2 class="text-3xl font-black text-foot-yellow tracking-widest">{{ $category->name }}</h2>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 mb-6 line-clamp-3">
                                {{ $category->description ?? 'Formation dédiée aux joueurs de la catégorie '.$category->name.'. Apprentissage des bases tactiques et développement de la technique individuelle.' }}
                            </p>
                            
                            <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-5 h-5 mr-2 text-foot-violet" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    <span class="font-bold text-gray-900 mr-1">{{ $category->players_count ?? 0 }}</span> joueurs
                                </div>
                                <a href="{{ route('players.index') }}" class="text-foot-violet font-bold text-sm hover:text-foot-yellow transition">
                                    Voir l'équipe &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-3 text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-gray-500">Aucune catégorie n'a encore été enregistrée.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
