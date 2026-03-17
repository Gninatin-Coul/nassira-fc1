<x-admin-layout>
    <x-slot:title>Nouveau Projet</x-slot>
    <x-slot:header>Créer un Projet</x-slot>

    <div class="max-w-4xl bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100 p-8">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Nom du projet</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm"
                    placeholder="Ex: Construction du nouveau terrain">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="status" class="block text-sm font-bold text-gray-700 mb-1">Statut</label>
                    <select name="status" id="status" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                        <option value="en cours" {{ old('status') === 'en cours' ? 'selected' : '' }}>En cours</option>
                        <option value="terminé" {{ old('status') === 'terminé' ? 'selected' : '' }}>Terminé</option>
                    </select>
                    @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="goal" class="block text-sm font-bold text-gray-700 mb-1">Objectif principal</label>
                    <input type="text" name="goal" id="goal" value="{{ old('goal') }}"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm"
                        placeholder="Ex: Financer les équipements">
                    @error('goal') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <x-image-upload 
                name="image" 
                label="Image (optionnel)" 
                :value="old('image')" 
                :maxSizeMB="2" 
            />

            <div>
                <label for="description" class="block text-sm font-bold text-gray-700 mb-1">Description détaillée</label>
                <textarea name="description" id="description" rows="6" required
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm"
                    placeholder="Décrivez le projet..."></textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 transition">Annuler</a>
                <button type="submit" class="bg-foot-violet text-white px-6 py-2 rounded-lg font-bold hover:bg-gray-900 transition">
                    Créer le projet
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
