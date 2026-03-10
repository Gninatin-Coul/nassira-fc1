<x-admin-layout>
    <x-slot:title>Inscriptions</x-slot>
    <x-slot:header>Suivi des Inscriptions</x-slot>

    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Demandes d'inscription</h2>
        <p class="text-sm text-gray-500">Gérez les dossiers des nouveaux joueurs arrivants.</p>
    </div>

    <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-bold tracking-wider">
                    <tr>
                        <th class="py-4 px-6">Enfant</th>
                        <th class="py-4 px-6">Parent / Contact</th>
                        <th class="py-4 px-6">Statut</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @if (count($registrations) > 0)
                        @foreach ($registrations as $reg)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6">
                                    <div class="text-sm font-bold text-gray-900">{{ $reg->child_name }}</div>
                                    <div class="text-xs text-gray-400">Né le {{ \Carbon\Carbon::parse($reg->child_birth_date)->format('d/m/Y') }}</div>
                                </td>
                                <td class="py-4 px-6 text-sm">
                                    <div class="font-medium">{{ $reg->parent_name }}</div>
                                    <div class="text-xs text-gray-400">{{ $reg->email }}</div>
                                    <div class="text-xs text-gray-400">{{ $reg->phone }}</div>
                                </td>
                                <td class="py-4 px-6">
                                    <form action="{{ route('admin.registrations.update', $reg->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" onchange="this.form.submit()" class="text-[10px] font-black uppercase rounded border-gray-200 py-1 px-2 {{ $reg->status === 'approved' ? 'bg-green-100 text-green-700 border-green-200' : ($reg->status === 'rejected' ? 'bg-red-100 text-red-700 border-red-200' : 'bg-yellow-100 text-yellow-700 border-yellow-200') }}">
                                            <option value="pending" {{ $reg->status === 'pending' ? 'selected' : '' }}>En attente</option>
                                            <option value="approved" {{ $reg->status === 'approved' ? 'selected' : '' }}>Approuvé</option>
                                            <option value="rejected" {{ $reg->status === 'rejected' ? 'selected' : '' }}>Rejeté</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <form action="{{ route('admin.registrations.destroy', $reg->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce dossier définitivement ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline text-sm font-bold">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="py-20 text-center text-gray-400 italic">Aucune inscription enregistrée.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @if($registrations->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $registrations->links() }}
        </div>
        @endif
    </div>
</x-admin-layout>
