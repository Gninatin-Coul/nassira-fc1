<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }} - Nassira FC</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-900 flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-foot-violet text-white flex flex-col hidden md:flex shrink-0">
        <div class="h-20 flex items-center px-6 border-b border-white/10">
            <span class="text-2xl font-extrabold text-foot-yellow tracking-tight">NASSIRA <span class="text-white">Admin</span></span>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.players.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.players.*') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span>Joueurs</span>
            </a>
            <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.categories.*') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <span>Catégories</span>
            </a>
            <a href="{{ route('admin.staff.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.staff.*') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span>Staff & Dirigeants</span>
            </a>
            <a href="{{ route('admin.games.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.games.*') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span>Matchs</span>
            </a>
            <a href="{{ route('admin.registrations.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.registrations.*') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <span>Inscriptions</span>
            </a>
            <a href="{{ route('admin.articles.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.articles.*') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path></svg>
                <span>Actualités</span>
            </a>
            <a href="{{ route('admin.projects.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.projects.*') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                <span>Projets</span>
            </a>
            <a href="{{ route('admin.messages.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.messages.*') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <span>Messages</span>
                @php $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                @if($unreadCount > 0)
                    <span class="bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full ml-auto">{{ $unreadCount }}</span>
                @endif
            </a>
            @can('manage users')
            <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.users.*') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span>Utilisateurs</span>
            </a>
            <a href="{{ route('admin.roles.index') }}" class="flex items-center space-x-3 px-4 py-3 {{ request()->routeIs('admin.roles.*') ? 'bg-white/10 text-foot-yellow font-bold' : 'hover:bg-white/5 text-gray-300 hover:text-white' }} rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                <span>Rôles & Permissions</span>
            </a>
            @endcan
        </nav>
        <div class="p-4 border-t border-white/10">
            <a href="{{ route('home') }}" class="flex items-center text-sm text-gray-400 hover:text-white">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Retour au site
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Top header -->
        <header class="h-20 bg-white shadow-sm flex items-center justify-between px-6 lg:px-10 z-10 shrink-0">
            <h1 class="text-2xl font-bold text-gray-800">{{ $header ?? 'Administration' }}</h1>
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-600">{{ auth()->user()->name ?? 'Admin' }}</span>
                <div class="w-10 h-10 rounded-full bg-foot-yellow flex items-center justify-center text-foot-violet font-bold">
                    {{ substr(auth()->user()->name ?? 'AD', 0, 2) }}
                </div>
                <div class="border-l border-gray-200 pl-4 ml-2">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800 hover:underline flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded-r-lg shadow-sm" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</body>
</html>
