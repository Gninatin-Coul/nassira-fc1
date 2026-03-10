<x-admin-layout>
    <x-slot:title>Joueurs</x-slot>
    <x-slot:header>Gestion de l'Effectif</x-slot>

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Liste des Joueurs</h2>
        <a href="{{ route('admin.players.create') }}" class="bg-foot-violet text-white px-4 py-2 rounded-lg font-bold hover:bg-gray-900 transition flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
            Nouveau Joueur
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-bold tracking-wider">
                    <tr>
                        <th class="py-4 px-6">Joueur</th>
                        <th class="py-4 px-6">Catégorie</th>
                        <th class="py-4 px-6">Position</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($players as $player)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-4 px-6 flex items-center">
                                <div class="w-10 h-10 rounded-full bg-gray-100 mr-3 overflow-hidden border">
                                    <img src="{{ $player->photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode($player->first_name.' '.$player->last_name).'&color=4C1D95&background=F3E8FF' }}" alt="" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-gray-900">{{ $player->first_name }} {{ $player->last_name }}</div>
                                    <div class="text-xs text-gray-400">Né le {{ \Carbon\Carbon::parse($player->birth_date)->format('d/m/Y') }}</div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 rounded-md text-[10px] font-black uppercase bg-foot-violet/10 text-foot-violet border border-foot-violet/20">
                                    {{ $player->category->name }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-sm">
                                {{ $player->position }}
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.players.edit', $player) }}" class="text-blue-600 hover:underline text-sm font-bold">Modifier</a>
                                <form action="{{ route('admin.players.destroy', $player) }}" method="POST" class="inline-block" onsubmit="return confirm('Retirer ce joueur de l\'effectif ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-bold">Retirer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-20 text-center text-gray-400 italic">Aucun joueur dans la base de données.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($players->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $players->links() }}
        </div>
        @endif
    </div>
</x-admin-layout>
