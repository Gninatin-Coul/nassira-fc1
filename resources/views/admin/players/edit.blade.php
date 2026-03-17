<x-admin-layout>
    <x-slot:title>Modifier le Joueur</x-slot>
    <x-slot:header>Éditer : {{ $player->first_name }} {{ $player->last_name }}</x-slot>

    <div class="max-w-4xl bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100 p-8">
        <form action="{{ route('admin.players.update', $player) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="first_name" class="block text-sm font-bold text-gray-700 mb-1">Prénom</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $player->first_name) }}" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                    @error('first_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="last_name" class="block text-sm font-bold text-gray-700 mb-1">Nom</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $player->last_name) }}" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                    @error('last_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="category_id" class="block text-sm font-bold text-gray-700 mb-1">Catégorie</label>
                    <select name="category_id" id="category_id" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $player->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="position" class="block text-sm font-bold text-gray-700 mb-1">Poste</label>
                    <input type="text" name="position" id="position" value="{{ old('position', $player->position) }}" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                    @error('position') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="birth_date" class="block text-sm font-bold text-gray-700 mb-1">Date de naissance</label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $player->birth_date) }}" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                    @error('birth_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <x-image-upload 
                name="photo" 
                label="Photo (optionnel)" 
                :value="old('photo', $player->photo_url ? asset('storage/' . $player->photo_url) : '')" 
                :maxSizeMB="2" 
            />

            <div>
                <label for="bio" class="block text-sm font-bold text-gray-700 mb-1">Biographie / Notes</label>
                <textarea name="bio" id="bio" rows="4"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">{{ old('bio', $player->bio) }}</textarea>
                @error('bio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.players.index') }}" class="px-4 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 transition">Annuler</a>
                <button type="submit" class="bg-foot-violet text-white px-6 py-2 rounded-lg font-bold hover:bg-gray-900 transition">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
