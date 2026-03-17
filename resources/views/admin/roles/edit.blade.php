<x-admin-layout>
    <x-slot:title>Éditer Rôle</x-slot>
    <x-slot:header>Éditer : {{ $role->name }}</x-slot>

    <div class="max-w-2xl bg-white shadow-sm rounded-xl border border-gray-100 p-8">
        <form action="{{ route('admin.roles.update', $role) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Nom du rôle</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" required
                    {{ in_array($role->name, ['Super Admin', 'Admin']) ? 'readonly' : '' }}
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-foot-violet focus:ring-foot-violet sm:text-sm {{ in_array($role->name, ['Super Admin', 'Admin']) ? 'bg-gray-50 text-gray-500' : '' }}">
                @if(in_array($role->name, ['Super Admin', 'Admin']))
                    <p class="text-xs text-gray-400 mt-1">Le nom des rôles système ne peut pas être modifié.</p>
                @endif
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-3">Permissions</label>
                <div class="space-y-3 border border-gray-200 rounded-lg p-4 bg-gray-50">
                    @php $rolePermissions = old('permissions', $role->permissions->pluck('name')->toArray()); @endphp
                    @foreach($permissions as $permission)
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}
                                class="h-4 w-4 rounded border-gray-300 text-foot-violet focus:ring-foot-violet">
                            <span class="text-sm font-medium text-gray-800 group-hover:text-foot-violet transition">{{ $permission->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end space-x-4 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 transition">Annuler</a>
                <button type="submit" class="bg-foot-violet text-white px-6 py-2 rounded-lg font-bold hover:bg-gray-900 transition">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
