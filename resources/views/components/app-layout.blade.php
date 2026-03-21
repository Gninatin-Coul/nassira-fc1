<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Nassira FC') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-50 flex flex-col min-h-screen">
        
        <!-- Header -->
        <header class="bg-foot-violet text-white shadow-md sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20 items-center">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('media/logo.jpeg') }}" alt="Nassira Académie Club" class="h-16 w-auto">
                        </a>
                    </div>
                    
                    <nav class="hidden lg:flex space-x-8">
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-foot-yellow font-bold' : 'text-white font-medium hover:text-foot-yellow' }} transition">Accueil</a>
                        <a href="{{ route('players.index') }}" class="{{ request()->routeIs('players.*') ? 'text-foot-yellow font-bold' : 'text-white font-medium hover:text-foot-yellow' }} transition">Effectif</a>
                        <a href="{{ route('staff.index') }}" class="{{ request()->routeIs('staff.index') ? 'text-foot-yellow font-bold' : 'text-white font-medium hover:text-foot-yellow' }} transition">Équipe</a>
                        <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'text-foot-yellow font-bold' : 'text-white font-medium hover:text-foot-yellow' }} transition">Catégories</a>
                        <a href="{{ route('games.index') }}" class="{{ request()->routeIs('games.index') ? 'text-foot-yellow font-bold' : 'text-white font-medium hover:text-foot-yellow' }} transition">Matchs</a>
                        <a href="{{ route('articles.index') }}" class="{{ request()->routeIs('articles.*') ? 'text-foot-yellow font-bold' : 'text-white font-medium hover:text-foot-yellow' }} transition">Actualités</a>
                        <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'text-foot-yellow font-bold' : 'text-white font-medium hover:text-foot-yellow' }} transition">Projets</a>
                        <a href="{{ route('contact.create') }}" class="{{ request()->routeIs('contact.create') ? 'text-foot-yellow font-bold' : 'text-white font-medium hover:text-foot-yellow' }} transition">Contact</a>
                    </nav>

                    <div class="hidden lg:flex">
                        <a href="{{ route('registrations.create') }}" class="bg-foot-yellow text-foot-violet px-5 py-2 rounded-full font-bold hover:bg-white transition shadow-lg transform hover:scale-105 duration-300">
                            Rejoindre le centre
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="lg:hidden flex items-center">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white hover:text-foot-yellow focus:outline-none transition">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="lg:hidden bg-foot-violet border-t border-white/10"
                 @click.away="mobileMenuOpen = false">
                <div class="px-4 pt-4 pb-6 space-y-2">
                    <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-lg {{ request()->routeIs('home') ? 'bg-foot-yellow text-foot-violet font-bold' : 'text-white hover:bg-white/10' }} transition">Accueil</a>
                    <a href="{{ route('players.index') }}" class="block px-4 py-3 rounded-xl text-lg {{ request()->routeIs('players.*') ? 'bg-foot-yellow text-foot-violet font-bold' : 'text-white hover:bg-white/10' }} transition">Effectif</a>
                    <a href="{{ route('staff.index') }}" class="block px-4 py-3 rounded-xl text-lg {{ request()->routeIs('staff.index') ? 'bg-foot-yellow text-foot-violet font-bold' : 'text-white hover:bg-white/10' }} transition">Équipe</a>
                    <a href="{{ route('categories.index') }}" class="block px-4 py-3 rounded-xl text-lg {{ request()->routeIs('categories.*') ? 'bg-foot-yellow text-foot-violet font-bold' : 'text-white hover:bg-white/10' }} transition">Catégories</a>
                    <a href="{{ route('games.index') }}" class="block px-4 py-3 rounded-xl text-lg {{ request()->routeIs('games.index') ? 'bg-foot-yellow text-foot-violet font-bold' : 'text-white hover:bg-white/10' }} transition">Matchs</a>
                    <a href="{{ route('articles.index') }}" class="block px-4 py-3 rounded-xl text-lg {{ request()->routeIs('articles.*') ? 'bg-foot-yellow text-foot-violet font-bold' : 'text-white hover:bg-white/10' }} transition">Actualités</a>
                    <a href="{{ route('projects.index') }}" class="block px-4 py-3 rounded-xl text-lg {{ request()->routeIs('projects.*') ? 'bg-foot-yellow text-foot-violet font-bold' : 'text-white hover:bg-white/10' }} transition">Projets</a>
                    <a href="{{ route('contact.create') }}" class="block px-4 py-3 rounded-xl text-lg {{ request()->routeIs('contact.create') ? 'bg-foot-yellow text-foot-violet font-bold' : 'text-white hover:bg-white/10' }} transition">Contact</a>
                    <div class="pt-4 border-t border-white/10">
                        <a href="{{ route('registrations.create') }}" class="block w-full text-center bg-foot-yellow text-foot-violet py-4 rounded-2xl font-bold shadow-lg">
                            Rejoindre le centre
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 pt-16 pb-8 border-t-[6px] border-foot-yellow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                    <div class="col-span-1 md:col-span-2">
                        <img src="{{ asset('media/logo.jpeg') }}" alt="Nassira Académie Club" class="h-16 w-auto">
                        <p class="mt-4 text-gray-400 max-w-sm">Le centre de formation de référence en Côte d'Ivoire. Nous construisons les champions de demain avec passion et rigueur.</p>
                        <div class="flex space-x-4 mt-6">
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-foot-violet hover:text-white transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-[#E1306C] hover:text-white transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                            <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-[#1877F2] hover:text-white transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg></a>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-4">Liens Rapides</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="{{ route('players.index') }}" class="hover:text-foot-yellow transition">Effectif</a></li>
                            <li><a href="{{ route('categories.index') }}" class="hover:text-foot-yellow transition">Catégories</a></li>
                            <li><a href="{{ route('articles.index') }}" class="hover:text-foot-yellow transition">Actualités</a></li>
                            <li><a href="{{ route('projects.index') }}" class="hover:text-foot-yellow transition">Projets</a></li>
                            <li><a href="{{ route('registrations.create') }}" class="hover:text-foot-yellow transition">Inscriptions</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-4">Contact</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li>Abidjan, Côte d'Ivoire</li>
                            <li>contact@nassirafc.ci</li>
                            <li>+225 00 00 00 00 00</li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                    <p>&copy; {{ date('Y') }} Nassira FC. Tous droits réservés.</p>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="hover:text-white transition">Mentions légales</a>
                        <a href="#" class="hover:text-white transition">Politique de confidentialité</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
