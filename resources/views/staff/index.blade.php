<x-app-layout>
    <x-slot:title>Notre Équipe - Nassira FC</x-slot:title>

    <!-- Header Section -->
    <div class="bg-foot-violet text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-5xl md:text-6xl font-black text-foot-yellow mb-6">Notre Équipe</h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed">
                Découvrez les dirigeants et les encadreurs dévoués qui forment l'excellence de Nassira FC au quotidien.
            </p>
        </div>
    </div>

    <!-- Dirigeants Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16">
                <span class="text-foot-violet font-black uppercase tracking-[0.3em] text-sm block mb-2">Direction</span>
                <h2 class="text-4xl font-black text-gray-900 italic">Les <span class="text-foot-violet underline decoration-foot-yellow underline-offset-8">Dirigeants</span></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @if(isset($dirigeants) && $dirigeants->count() > 0)
                    @foreach($dirigeants as $member)
                        <div class="group">
                            <div class="relative overflow-hidden rounded-[2.5rem] bg-gray-100 aspect-[4/5] mb-6 shadow-xl">
                                <img src="{{ $member->photo_url ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1974&auto=format&fit=crop' }}" 
                                     alt="{{ $member->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-foot-violet via-transparent to-transparent p-8 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    <p class="text-white text-sm font-medium italic">{{ $member->bio }}</p>
                                </div>
                            </div>
                            <h3 class="text-2xl font-black text-gray-900 mb-1">{{ $member->name }}</h3>
                            <p class="text-foot-violet font-bold uppercase tracking-widest text-sm italic">{{ $member->role }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-3 py-12 text-center text-gray-400 italic">
                        Les informations de direction seront bientôt disponibles.
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Personnel Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-right">
                <span class="text-foot-violet font-black uppercase tracking-[0.3em] text-sm block mb-2">Encadrement</span>
                <h2 class="text-4xl font-black text-gray-900 italic">Le <span class="text-foot-violet underline decoration-foot-yellow underline-offset-8">Personnel</span> Administratif</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @if(isset($personnel) && $personnel->count() > 0)
                    @foreach($personnel as $member)
                        <div class="bg-white p-8 rounded-[2rem] shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="w-24 h-24 rounded-2xl bg-foot-violet/10 flex items-center justify-center mb-6 overflow-hidden">
                                @if($member->photo_url)
                                    <img src="{{ $member->photo_url }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-12 h-12 text-foot-violet" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $member->name }}</h3>
                            <p class="text-foot-violet font-medium text-sm">{{ $member->role }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-4 py-12 text-center text-gray-400 italic">
                        Les informations sur le personnel administratif seront bientôt disponibles.
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>
