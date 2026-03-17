<x-admin-layout>
    <x-slot:title>Modifier Utilisateur</x-slot>
    <x-slot:header>Éditer : {{ $user->name }}</x-slot>

    <div class="max-w-4xl bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100 p-8">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Nom complet</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Email de connexion</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="bg-blue-50 text-blue-800 p-4 rounded-lg text-sm border border-blue-100">
                Laissez les champs mot de passe vides si vous ne souhaitez pas le modifier.
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-1">Nouveau mot de passe</label>
                    <input type="password" name="password" id="password"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-1">Confirmer le nouveau mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm">
                </div>
            </div>

            {{-- Rôles --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Rôles</label>
                <p class="text-xs text-gray-500 mb-3">Les permissions sont héritées des rôles assignés.</p>
                <div class="space-y-3 border border-gray-200 rounded-lg p-4 bg-gray-50">
                    @php $userRoles = old('roles', $user->roles->pluck('name')->toArray()); @endphp
                    @foreach($roles as $role)
                        <label class="flex items-start gap-3 cursor-pointer group">
                            <div class="flex items-center h-5 mt-0.5">
                                <input id="role_{{ $role->id }}" name="roles[]" type="checkbox" value="{{ $role->name }}"
                                    {{ in_array($role->name, $userRoles) ? 'checked' : '' }}
                                    class="h-4 w-4 rounded border-gray-300 text-foot-violet focus:ring-foot-violet"
                                    {{ ($user->id === auth()->id() && $role->name === 'Super Admin') ? 'disabled' : '' }}>
                                @if($user->id === auth()->id() && $role->name === 'Super Admin')
                                    <input type="hidden" name="roles[]" value="Super Admin">
                                @endif
                            </div>
                            <div class="text-sm">
                                <span class="font-medium text-gray-800 group-hover:text-foot-violet transition">{{ $role->name }}</span>
                                <p class="text-gray-500 text-xs">
                                    {{ $role->permissions->pluck('name')->implode(', ') ?: 'Aucune permission' }}
                                </p>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('roles') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Permissions directes --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Permissions directes</label>
                <p class="text-xs text-gray-500 mb-3">Permissions supplémentaires accordées directement à cet utilisateur, indépendamment de son rôle.</p>
                <div class="space-y-3 border border-gray-200 rounded-lg p-4 bg-gray-50">
                    @php $userDirectPerms = old('permissions', $user->getDirectPermissions()->pluck('name')->toArray()); @endphp
                    @foreach($permissions as $permission)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                {{ in_array($permission->name, $userDirectPerms) ? 'checked' : '' }}
                                class="h-4 w-4 rounded border-gray-300 text-foot-violet focus:ring-foot-violet">
                            <span class="text-sm font-medium text-gray-800 group-hover:text-foot-violet transition">{{ $permission->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end space-x-4 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 transition">Annuler</a>
                <button type="submit" class="bg-foot-violet text-white px-6 py-2 rounded-lg font-bold hover:bg-gray-900 transition">
                    Mettre à jour l'utilisateur
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
