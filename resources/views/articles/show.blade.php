<x-app-layout>
    <x-slot:title>
        {{ $article->title }} - Nassira FC
    </x-slot>

    <!-- Article Detail Section -->
    <div class="py-16 bg-white">
        <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <header class="mb-10 text-center">
                <div class="inline-block bg-foot-yellow text-foot-violet px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                    Actualités
                </div>
                <h1 class="text-3xl md:text-5xl font-black text-gray-900 mb-6 leading-tight">
                    {{ $article->title }}
                </h1>
                <div class="flex items-center justify-center text-gray-500 space-x-4 italic">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Par Nassira FC
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $article->published_at ? $article->published_at->format('d F Y') : $article->created_at->format('d F Y') }}
                    </span>
                </div>
            </header>

            <div class="mb-12 rounded-3xl overflow-hidden shadow-2xl h-[400px] md:h-[500px]">
                <img src="{{ $article->image_url ?? 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=2093&auto=format&fit=crop' }}" 
                     alt="{{ $article->title }}" 
                     class="w-full h-full object-cover">
            </div>

            <div class="prose prose-lg prose-violet max-w-none text-gray-700 leading-relaxed">
                {!! nl2br(e($article->content)) !!}
            </div>

            <footer class="mt-16 pt-10 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 text-center md:text-left">
                <div class="flex items-center space-x-4">
                    <span class="text-gray-900 font-bold">Partager :</span>
                    <div class="flex space-x-2">
                        <button class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-foot-violet hover:text-white transition">F</button>
                        <button class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-foot-violet hover:text-white transition">X</button>
                    </div>
                </div>
                <a href="{{ route('articles.index') }}" class="text-foot-violet font-bold flex items-center hover:underline">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Toutes les actualités
                </a>
            </footer>
        </article>
    </div>
</x-app-layout>
