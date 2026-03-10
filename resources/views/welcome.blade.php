<x-app-layout>
    <x-slot:title>Accueil - Nassira FC</x-slot>

    <!-- Hero Section -->
    <section class="relative bg-foot-violet text-white overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-[600px] flex items-center">
            <div class="max-w-2xl space-y-8">
                <div class="inline-block px-4 py-1.5 rounded-full bg-foot-yellow/20 border border-foot-yellow/50 text-foot-yellow font-semibold text-sm mb-4">
                    Saison 2026-2027
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight leading-tight">
                    L'excellence du <br>
                    <span class="text-foot-yellow">Football</span> Ivoirien.
                </h1>
                <p class="text-xl text-gray-200 font-medium">
                    Formez la prochaine génération de champions au sein du Nassira FC. Rejoignez une académie d'élite axée sur la performance et le développement personnel.
                </p>
                <div class="flex gap-4 pt-4">
                    <a href="{{ route('registrations.create') }}" class="bg-foot-yellow text-foot-violet px-8 py-4 rounded-full font-bold text-lg hover:bg-white transition shadow-[0_0_20px_rgba(250,204,21,0.4)] transform hover:-translate-y-1">
                        S'inscrire aux détections
                    </a>
                    <a href="{{ route('players.index') }}" class="bg-foot-violet border-2 border-white text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-foot-violet transition">
                        Voir nos talents
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Slanted decorator -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none transform translate-y-1">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[60px] fill-current text-gray-50">
                <path d="M1200 120L0 120 0 0 1200 120z"></path>
            </svg>
        </div>
    </section>

    <!-- Présentation Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-extrabold text-foot-violet mb-6">Notre Philosophie</h2>
            <div class="w-24 h-1 bg-foot-yellow mx-auto mb-10 rounded-full"></div>
            <div class="grid md:grid-cols-3 gap-12 mt-16 max-w-5xl mx-auto text-left">
                <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 transform transition hover:-translate-y-2">
                    <div class="w-14 h-14 bg-foot-violet rounded-xl flex items-center justify-center mb-6 shadow-md">
                        <svg class="w-7 h-7 text-foot-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-foot-violet mb-4">Performance</h3>
                    <p class="text-gray-600">Des entraînements intensifs basés sur les méthodologies modernes européennes pour repousser vos limites.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 transform transition hover:-translate-y-2">
                    <div class="w-14 h-14 bg-foot-yellow rounded-xl flex items-center justify-center mb-6 shadow-md">
                        <svg class="w-7 h-7 text-foot-violet" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-foot-violet mb-4">Esprit d'équipe</h3>
                    <p class="text-gray-600">Le groupe prime sur l'individu. Nous formons des joueurs capables de sublimer le collectif sur le terrain.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 transform transition hover:-translate-y-2">
                    <div class="w-14 h-14 bg-foot-violet rounded-xl flex items-center justify-center mb-6 shadow-md">
                        <svg class="w-7 h-7 text-foot-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-foot-violet mb-4">Excellence</h3>
                    <p class="text-gray-600">Un suivi scolaire et médical rigoureux pour garantir le développement physique et intellectuel de nos académiciens.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Preview Joueurs Vedettes -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-extrabold text-foot-violet">Nos Pépites</h2>
                    <p class="text-gray-500 mt-2 text-lg">Découvrez les talents prometteurs du centre de formation.</p>
                </div>
                <a href="{{ route('players.index') }}" class="text-foot-violet font-bold hover:text-foot-yellow transition hidden sm:inline-flex items-center group">
                    Voir tout l'effectif 
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @if(isset($featuredPlayers) && $featuredPlayers->count() > 0)
                    @foreach($featuredPlayers as $player)
                        <x-player-card :player="$player" />
                    @endforeach
                @else
                    <div class="col-span-4 text-center py-12 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                        <p class="text-gray-500">Aucun joueur vedette n'est encore défini.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- News Section -->
    <div class="py-24 bg-gray-50 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <span class="text-foot-violet font-bold uppercase tracking-widest mb-4 block">Actualités</span>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 italic">Dernières du <span class="text-foot-violet underline decoration-foot-yellow underline-offset-8">Centre</span></h2>
                </div>
                <a href="{{ route('articles.index') }}" class="hidden md:flex items-center text-foot-violet font-bold hover:text-gray-900 transition font-black">
                    Voir tout <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @if(isset($latestArticles) && $latestArticles->count() > 0)
                    @foreach($latestArticles as $article)
                        <a href="{{ route('articles.show', $article) }}" class="group block bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 border border-gray-100 transform hover:-translate-y-2">
                            <div class="relative overflow-hidden h-64">
                                <img src="{{ $article->image_url ?? 'https://images.unsplash.com/photo-1541534741688-6078c64b5903?q=80&w=2070&auto=format&fit=crop' }}" 
                                     alt="{{ $article->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="p-8">
                                <span class="text-gray-400 text-xs font-black uppercase tracking-widest mb-3 block">{{ $article->published_at ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y') }}</span>
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-foot-violet transition-colors leading-tight mb-4">{{ $article->title }}</h3>
                                <span class="text-foot-violet font-black text-sm flex items-center group-hover:text-gray-900 transition">
                                    Lire l'article
                                    <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </span>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="col-span-3 text-center py-12 bg-white rounded-2xl border border-gray-100 mt-8">
                        <p class="text-gray-500 italic">Aucune actualité récente.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
