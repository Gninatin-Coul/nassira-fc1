<x-app-layout>
    <x-slot:title>Calendrier & Résultats - Nassira FC</x-slot:title>

    <!-- Header Section -->
    <div class="bg-foot-violet text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-5xl md:text-6xl font-black text-foot-yellow mb-6 uppercase tracking-tighter">Matchs & Résultats</h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed">
                Suivez les performances de nos pépites sur le terrain. Calendrier des rencontres et scores des matchs passés.
            </p>
        </div>
    </div>

    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Upcomming Games -->
            <div class="mb-20">
                <div class="flex items-center space-x-4 mb-12">
                    <span class="w-12 h-1 bg-foot-yellow"></span>
                    <h2 class="text-3xl font-black text-gray-900 uppercase italic">Prochaines <span class="text-foot-violet">Rencontres</span></h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @if(isset($games) && $games->count() > 0)
                        @foreach($games as $game)
                            <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden border border-gray-100 flex items-stretch group">
                                <div class="w-1/3 bg-foot-violet flex flex-col items-center justify-center p-6 text-white text-center">
                                    <span class="text-xs font-black uppercase tracking-widest opacity-60 mb-2">{{ $game->match_date->translatedFormat('F') }}</span>
                                    <span class="text-5xl font-black text-foot-yellow tracking-tighter">{{ $game->match_date->format('d') }}</span>
                                    <span class="text-sm font-bold mt-2">{{ $game->match_date->format('H:i') }}</span>
                                </div>
                                <div class="flex-grow p-8 flex flex-col justify-center">
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="px-4 py-1 rounded-full bg-gray-100 text-gray-500 text-xs font-black uppercase tracking-widest border border-gray-200">Amical</span>
                                        @if($game->location)
                                            <span class="flex items-center text-xs text-gray-400 font-medium">
                                                <svg class="w-4 h-4 mr-1 text-foot-violet" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                                {{ $game->location }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="text-center w-1/3">
                                            <div class="w-12 h-12 rounded-xl bg-foot-violet/10 flex items-center justify-center mx-auto mb-2">
                                                <span class="font-black text-foot-violet">NFC</span>
                                            </div>
                                            <span class="text-sm font-black text-gray-900 block">Nassira FC</span>
                                        </div>
                                        <div class="text-2xl font-black text-gray-300 italic">VS</div>
                                        <div class="text-center w-1/3">
                                            <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mx-auto mb-2">
                                                <span class="font-black text-gray-400 uppercase leading-none">{{ substr($game->opponent, 0, 3) }}</span>
                                            </div>
                                            <span class="text-sm font-black text-gray-900 block">{{ $game->opponent }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-2 py-12 text-center bg-white rounded-3xl border-2 border-dashed border-gray-200">
                            <p class="text-gray-400 italic">Aucun prochain match programmé.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Past Results -->
            <div>
                <div class="flex items-center space-x-4 mb-12">
                    <span class="w-12 h-1 bg-gray-300"></span>
                    <h2 class="text-3xl font-black text-gray-900 uppercase italic">Résultats <span class="text-gray-400">Récents</span></h2>
                </div>

                <div class="space-y-6">
                    @if(isset($pastGames) && $pastGames->count() > 0)
                        @foreach($pastGames as $game)
                            <div class="bg-white p-6 rounded-3xl shadow-lg border border-gray-100 flex flex-col md:flex-row items-center justify-between hover:scale-[1.01] transition-transform duration-300">
                                <div class="flex items-center space-x-6 mb-4 md:mb-0">
                                    <div class="text-center">
                                        <span class="text-xs font-black text-gray-400 block">{{ $game->match_date->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="font-black text-gray-900">Nassira FC</span>
                                        <div class="flex space-x-2">
                                            <span class="w-10 h-10 bg-foot-violet text-white flex items-center justify-center rounded-xl font-black text-xl shadow-lg shadow-foot-violet/20">{{ $game->home_score ?? 0 }}</span>
                                            <span class="w-10 h-10 bg-gray-100 text-gray-400 flex items-center justify-center rounded-xl font-black text-xl border border-gray-200">{{ $game->away_score ?? 0 }}</span>
                                        </div>
                                        <span class="font-black text-gray-900">{{ $game->opponent }}</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-xs font-bold px-3 py-1 rounded-full {{ ($game->home_score > $game->away_score) ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-500' }}">
                                        {{ ($game->home_score > $game->away_score) ? 'Victoire' : 'Résultat' }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="py-12 text-center text-gray-400 italic">
                            Aucun résultat enregistré.
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
