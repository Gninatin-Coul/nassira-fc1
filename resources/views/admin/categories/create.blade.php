<x-admin-layout>
    <x-slot:title>Nouvelle Catégorie</x-slot>
    <x-slot:header>Créer une Catégorie</x-slot>

    <div class="max-w-2xl bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100 p-8">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Nom (ex: U12, U15...)</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm"
                    placeholder="Ex: U17">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-bold text-gray-700 mb-1">Description (optionnel)</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm"
                    placeholder="Ex: Équipe de compétition régionale"></textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 transition">Annuler</a>
                <button type="submit" class="bg-foot-violet text-white px-6 py-2 rounded-lg font-bold hover:bg-gray-900 transition">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
