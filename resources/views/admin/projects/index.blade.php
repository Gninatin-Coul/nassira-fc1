<x-admin-layout>
    <x-slot:title>Projets</x-slot>
    <x-slot:header>Gestion des Projets</x-slot>

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Liste des Projets</h2>
        <a href="{{ route('admin.projects.create') }}" class="bg-foot-violet text-white px-4 py-2 rounded-lg font-bold hover:bg-gray-900 transition flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
            Nouveau Projet
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-bold tracking-wider">
                    <tr>
                        <th class="py-4 px-6">Nom</th>
                        <th class="py-4 px-6">Objectif</th>
                        <th class="py-4 px-6">Statut</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($projects as $project)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-4 px-6">
                                <div class="text-sm font-bold text-gray-900">{{ $project->name }}</div>
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500">
                                {{ $project->goal }}
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 rounded text-[10px] font-black uppercase {{ $project->status === 'terminé' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $project->status }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:underline text-sm font-bold">Modifier</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce projet ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-bold">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-20 text-center text-gray-400 italic">Aucun projet trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
