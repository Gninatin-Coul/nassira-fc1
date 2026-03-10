<x-admin-layout>
    <x-slot:title>Gestion du Staff</x-slot>
    <x-slot:header>Membres du Centre</x-slot>

    <div class="mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Liste du Staff</h2>
            <p class="text-sm text-gray-500">Dirigeants et encadreurs de Nassira FC</p>
        </div>
        <a href="{{ route('admin.staff.create') }}" class="bg-foot-violet text-white px-6 py-3 rounded-xl font-bold hover:shadow-lg transition transform hover:-translate-y-0.5 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Ajouter un membre
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-black uppercase text-gray-400 tracking-widest">Membre</th>
                        <th class="px-6 py-4 text-xs font-black uppercase text-gray-400 tracking-widest">Rôle</th>
                        <th class="px-6 py-4 text-xs font-black uppercase text-gray-400 tracking-widest">Type</th>
                        <th class="px-6 py-4 text-xs font-black uppercase text-gray-400 tracking-widest">Ordre</th>
                        <th class="px-6 py-4 text-xs font-black uppercase text-gray-400 tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($staff as $member)
                        <tr class="hover:bg-gray-50/50 transition duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 rounded-xl bg-foot-violet/10 overflow-hidden flex-shrink-0">
                                        @if($member->photo_url)
                                            <img src="{{ $member->photo_url }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-foot-violet font-bold">
                                                {{ substr($member->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <span class="font-bold text-gray-900">{{ $member->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $member->role }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider {{ $member->type === 'dirigeant' ? 'bg-amber-100 text-amber-700' : 'bg-blue-100 text-blue-700' }}">
                                    {{ $member->type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-400">{{ $member->order }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('admin.staff.edit', $member) }}" class="p-2 text-gray-400 hover:text-foot-violet transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.staff.destroy', $member) }}" method="POST" onsubmit="return confirm('Supprimer ce membre ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="p-2 text-gray-400 hover:text-red-500 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400 italic">Aucun membre enregistré pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($staff->hasPages())
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                {{ $staff->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
