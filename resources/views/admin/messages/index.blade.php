<x-admin-layout>
    <x-slot:title>Messages</x-slot>
    <x-slot:header>Gestion des Messages</x-slot>

    <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-bold tracking-wider">
                    <tr>
                        <th class="py-4 px-6">Date</th>
                        <th class="py-4 px-6">Expéditeur</th>
                        <th class="py-4 px-6">Sujet</th>
                        <th class="py-4 px-6">Statut</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($messages as $message)
                        <tr class="hover:bg-gray-50/50 transition {{ !$message->is_read ? 'bg-foot-violet/5 font-bold' : '' }}">
                            <td class="py-4 px-6 text-sm">{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-4 px-6">
                                <div class="text-sm font-bold">{{ $message->name }}</div>
                                <div class="text-xs text-gray-400 font-normal">{{ $message->email }}</div>
                            </td>
                            <td class="py-4 px-6 text-sm">{{ $message->subject }}</td>
                            <td class="py-4 px-6">
                                @if($message->is_read)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-black uppercase bg-green-100 text-green-700">Lu</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-black uppercase bg-foot-violet text-white">Nouveau</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                @if(!$message->is_read)
                                    <form action="{{ route('admin.messages.read', $message->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-foot-violet hover:underline text-sm font-bold">Marquer comme lu</button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-sm">Déjà lu</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-20 text-center text-gray-400 italic">Aucun message reçu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
