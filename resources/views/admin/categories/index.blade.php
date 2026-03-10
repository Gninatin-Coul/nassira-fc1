<x-admin-layout>
    <x-slot:title>Catégories</x-slot>
    <x-slot:header>Gestion des Catégories</x-slot>

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Tranches d'âge</h2>
        <a href="{{ route('admin.categories.create') }}" class="bg-foot-violet text-white px-4 py-2 rounded-lg font-bold hover:bg-gray-900 transition flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
            Nouvelle Catégorie
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-bold tracking-wider">
                    <tr>
                        <th class="py-4 px-6">Nom</th>
                        <th class="py-4 px-6">Description</th>
                        <th class="py-4 px-6">Effectif</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-4 px-6 font-bold text-gray-900">
                                {{ $category->name }}
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500">
                                {{ $category->description ?? 'Aucune description' }}
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs font-bold text-gray-600">
                                    {{ $category->players_count }} joueurs
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:underline text-sm font-bold">Modifier</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer cette catégorie ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-bold">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-20 text-center text-gray-400 italic">Aucune catégorie définie.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
