<x-admin-layout>
    <x-slot:title>Dashboard</x-slot>
    <x-slot:header>Vue d'ensemble</x-slot>

    <!-- Dashboard Widgets -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Widget 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center space-x-4">
            <div class="w-14 h-14 rounded-full bg-foot-violet/10 flex items-center justify-center text-foot-violet">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Joueurs Actifs</p>
                <p class="text-2xl font-bold text-gray-900">{{ $playersCount }}</p>
            </div>
        </div>

        <!-- Widget 2 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center space-x-4">
            <div class="w-14 h-14 rounded-full bg-foot-yellow/20 flex items-center justify-center text-yellow-600">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Actualités</p>
                <p class="text-2xl font-bold text-gray-900">{{ $articlesCount }}</p>
            </div>
        </div>

        <!-- Widget 3 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center space-x-4">
            <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Projets</p>
                <p class="text-2xl font-bold text-gray-900">{{ $projectsCount }}</p>
            </div>
        </div>

        <!-- Widget 4 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center space-x-4">
            <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Personnel</p>
                <p class="text-2xl font-bold text-gray-900">{{ $staffCount }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Recent Inscriptions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-800">Dernières Inscriptions</h2>
                <a href="{{ route('admin.registrations.index') }}" class="text-sm text-foot-violet font-bold hover:underline">Voir tout</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-bold">
                        <tr>
                            <th class="px-6 py-3">Enfant</th>
                            <th class="px-6 py-3">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($recentInscriptions as $reg)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900">{{ $reg->child_name }}</div>
                                    <div class="text-xs text-gray-500">{{ $reg->parent_name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded text-[10px] font-black uppercase {{ $reg->status === 'approved' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ $reg->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-8 text-center text-gray-400 italic text-sm">Aucune inscription.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-800">Derniers Messages</h2>
                <a href="{{ route('admin.messages.index') }}" class="text-sm text-foot-violet font-bold hover:underline">Voir tout</a>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse ($recentMessages as $msg)
                    <div class="p-4 hover:bg-gray-50 transition flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-foot-violet/10 flex items-center justify-center text-foot-violet font-bold uppercase">{{ substr($msg->name, 0, 1) }}</div>
                            <div>
                                <p class="text-sm font-bold text-gray-900 {{ !$msg->is_read ? 'text-foot-violet' : '' }}">{{ $msg->name }}</p>
                                <p class="text-xs text-gray-400 line-clamp-1 break-all">{{ $msg->subject }}</p>
                            </div>
                        </div>
                        <span class="text-[10px] text-gray-400 font-medium whitespace-nowrap ml-4">{{ $msg->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <div class="p-8 text-center text-gray-400 italic text-sm">Aucun message.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-admin-layout>
