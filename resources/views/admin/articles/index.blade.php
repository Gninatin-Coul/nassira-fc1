<x-admin-layout>
    <x-slot:title>Actualités</x-slot>
    <x-slot:header>Gestion des Actualités</x-slot>

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Liste des Articles</h2>
        <a href="{{ route('admin.articles.create') }}" class="bg-foot-violet text-white px-4 py-2 rounded-lg font-bold hover:bg-gray-900 transition flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
            Nouvel Article
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-bold tracking-wider">
                    <tr>
                        <th class="py-4 px-6">Titre</th>
                        <th class="py-4 px-6">Date de pub.</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse($articles as $article)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-4 px-6">
                                <div class="text-sm font-bold text-gray-900">{{ $article->title }}</div>
                                <div class="text-xs text-gray-400">{{\Illuminate\Support\Str::limit(strip_tags($article->content), 50)}}</div>
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500">
                                {{ $article->published_at ? $article->published_at->format('d/m/Y') : 'Brouillon' }}
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.articles.edit', $article) }}" class="text-blue-600 hover:underline text-sm font-bold">Modifier</a>
                                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer cet article ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-bold">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-20 text-center text-gray-400 italic">Aucun article trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-100">
            {{ $articles->links() }}
        </div>
    </div>
</x-admin-layout>
