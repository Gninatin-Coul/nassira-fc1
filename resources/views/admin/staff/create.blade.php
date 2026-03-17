<x-admin-layout>
    <x-slot:title>Ajouter un membre</x-slot>
    <x-slot:header>Nouveau Staff</x-slot>

    <div class="max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('admin.staff.index') }}" class="text-sm font-bold text-foot-violet hover:underline flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Retour à la liste
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="text-sm font-bold text-gray-700">Nom complet</label>
                        <input type="text" name="name" required value="{{ old('name') }}"
                            class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-4 focus:ring-foot-violet/5 focus:border-foot-violet transition duration-200">
                    </div>

                    <div class="space-y-1">
                        <label class="text-sm font-bold text-gray-700">Rôle / Titre</label>
                        <input type="text" name="role" required value="{{ old('role') }}" placeholder="Entraîneur, Président, etc."
                            class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-4 focus:ring-foot-violet/5 focus:border-foot-violet transition duration-200">
                    </div>

                    <div class="space-y-1">
                        <label class="text-sm font-bold text-gray-700">Type de profil</label>
                        <select name="type" required
                            class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-4 focus:ring-foot-violet/5 focus:border-foot-violet transition duration-200">
                            <option value="personnel" {{ old('type') == 'personnel' ? 'selected' : '' }}>Personnel / Encadreur</option>
                            <option value="dirigeant" {{ old('type') == 'dirigeant' ? 'selected' : '' }}>Dirigeant</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label class="text-sm font-bold text-gray-700">Ordre d'affichage</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}"
                            class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-4 focus:ring-foot-violet/5 focus:border-foot-violet transition duration-200">
                    </div>
                </div>

                <x-image-upload 
                    name="photo" 
                    label="Photo (Optionnel)" 
                    :value="old('photo')" 
                    :maxSizeMB="2" 
                />

                <div class="space-y-1">
                    <label class="text-sm font-bold text-gray-700">Courte Bio</label>
                    <textarea name="bio" rows="4"
                        class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-4 focus:ring-foot-violet/5 focus:border-foot-violet transition duration-200">{{ old('bio') }}</textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full md:w-auto px-10 py-4 bg-foot-violet text-white rounded-2xl font-black text-lg hover:shadow-xl transition-all duration-300 transform active:scale-95">
                        Enregistrer le membre
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
