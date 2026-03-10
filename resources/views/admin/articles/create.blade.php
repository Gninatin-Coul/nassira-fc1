<x-admin-layout>
    <x-slot:title>Nouvel Article</x-slot>
    <x-slot:header>Créer un Article</x-slot>

    <div class="max-w-4xl bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100 p-8">
        <form action="{{ route('admin.articles.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="title" class="block text-sm font-bold text-gray-700 mb-1">Titre de l'article</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm"
                    placeholder="Ex: Nouveau titre de champion pour les U12">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="image_url" class="block text-sm font-bold text-gray-700 mb-1">URL de l'image (optionnel)</label>
                <input type="url" name="image_url" id="image_url" value="{{ old('image_url') }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm"
                    placeholder="https://example.com/image.jpg">
                @error('image_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-bold text-gray-700 mb-1">Contenu</label>
                <textarea name="content" id="content" rows="10" required
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm"
                    placeholder="Rédigez votre article ici...">{{ old('content') }}</textarea>
                @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="published_at" class="block text-sm font-bold text-gray-700 mb-1">Date de publication</label>
                <input type="date" name="published_at" id="published_at" value="{{ old('published_at', date('Y-m-d')) }}"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                @error('published_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 transition">Annuler</a>
                <button type="submit" class="bg-foot-violet text-white px-6 py-2 rounded-lg font-bold hover:bg-gray-900 transition">
                    Enregistrer l'article
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
