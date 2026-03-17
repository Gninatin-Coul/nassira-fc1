<x-admin-layout>
    <x-slot:title>Rôles & Permissions</x-slot>
    <x-slot:header>Gestion des Rôles</x-slot>

    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Rôles disponibles</h2>
            <p class="text-sm text-gray-500">Gérez les rôles et leurs permissions associées.</p>
        </div>
        <a href="{{ route('admin.roles.create') }}" class="bg-foot-violet text-white px-4 py-2 rounded-lg font-bold hover:bg-gray-900 transition flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Nouveau Rôle
        </a>
    </div>

    @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($roles as $role)
            <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
                <div class="p-5 border-b border-gray-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold
                            {{ $role->name === 'Super Admin' ? 'bg-red-100 text-red-800' : 'bg-foot-yellow/20 text-foot-violet' }}">
                            {{ $role->name }}
                        </span>
                        <span class="text-xs text-gray-400">{{ $role->users()->count() }} utilisateur(s)</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.roles.edit', $role) }}" class="text-foot-violet hover:text-indigo-900 text-sm font-medium">Éditer</a>
                        @if(!in_array($role->name, ['Super Admin', 'Admin']))
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce rôle ?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">Suppr.</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="p-5">
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-3">Permissions</p>
                    @if($role->permissions->isEmpty())
                        <p class="text-sm text-gray-400 italic">Aucune permission assignée</p>
                    @else
                        <div class="flex flex-wrap gap-2">
                            @foreach($role->permissions as $permission)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-green-100 text-green-800">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    {{ $permission->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</x-admin-layout>
