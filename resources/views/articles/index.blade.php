<x-app-layout>
    <x-slot:title>
        Actualités - Nassira FC
    </x-slot>

    <!-- Header Section -->
    <div class="bg-foot-violet text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-foot-yellow mb-4">Actualités du Centre</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Suivez toute la vie de Nassira FC : résultats de matchs, événements et annonces importantes.
            </p>
        </div>
    </div>

    <!-- Articles Grid Section -->
    <div class="py-12 bg-gray-50 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @if(isset($articles) && $articles->count() > 0)
                @foreach ($articles as $article)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ $article->image_url ?? 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=2093&auto=format&fit=crop' }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-4 left-4">
                                <span class="bg-foot-yellow text-foot-violet px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                                    News
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-gray-500 mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-foot-violet transition-colors">
                                {{ $article->title }}
                            </h2>
                            <p class="text-gray-600 mb-6 line-clamp-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                            </p>
                            <a href="{{ route('articles.show', $article) }}" 
                               class="inline-flex items-center text-foot-violet font-bold hover:text-foot-yellow transition-colors">
                                Lire la suite
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-3 text-center py-16">
                    <p class="text-gray-500 italic">Aucune actualité pour le moment.</p>
                </div>
            @endif
        </div>

        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
