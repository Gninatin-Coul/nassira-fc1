<x-app-layout>
    <x-slot:title>
        Projets - Nassira FC
    </x-slot>

    <!-- Header Section -->
    <div class="bg-foot-violet text-white py-16 border-b-8 border-foot-yellow relative overflow-hidden">
        <div class="absolute inset-0 bg-foot-violet/40 mix-blend-multiply"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Nos Projets de Développement</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Accompagner la formation par des infrastructures modernes et des partenariats stratégiques.
            </p>
        </div>
    </div>

    <!-- Projects List -->
    <div class="py-16 bg-gray-50 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-16">
            @forelse ($projects as $project)
                <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden flex flex-col md:flex-row items-stretch border border-gray-100 group">
                    <div class="md:w-1/2 relative overflow-hidden h-72 md:h-auto">
                        <img src="{{ $project->image_url ?? 'https://images.unsplash.com/photo-1541252260730-0412e3e2104e?q=80&w=1974&auto=format&fit=crop' }}" 
                             alt="{{ $project->name }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                        <div class="flex items-center space-x-3 mb-6">
                            <span class="px-4 py-1 rounded-full text-xs font-black uppercase tracking-widest border {{ $project->status === 'terminé' ? 'bg-green-100 text-green-700 border-green-200' : 'bg-yellow-100 text-yellow-700 border-yellow-200' }}">
                                {{ $project->status }}
                            </span>
                        </div>
                        <h2 class="text-3xl font-black text-gray-900 mb-6">{{ $project->name }}</h2>
                        <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            {{ \Illuminate\Support\Str::limit($project->description, 180) }}
                        </p>
                        <div class="flex flex-wrap items-center gap-4">
                            <a href="{{ route('projects.show', $project->id) }}" class="inline-flex items-center text-foot-violet font-black hover:underline group">
                                En savoir plus
                                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                        @if($project->goal)
                            <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                                <span class="text-sm font-bold text-gray-400 uppercase tracking-widest block mb-2">Objectif principal</span>
                                <span class="text-xl font-bold text-foot-violet">{{ $project->goal }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-20 bg-white rounded-3xl border border-gray-100">
                    <p class="text-gray-500">Aucun projet n'est listé pour le moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
