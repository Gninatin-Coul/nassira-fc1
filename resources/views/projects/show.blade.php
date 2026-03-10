<x-app-layout>
    <x-slot:title>
        {{ $project->name }} - Nassira FC
    </x-slot>

    <!-- Header / Hero Section -->
    <div class="relative h-96 overflow-hidden">
        <img src="{{ $project->image_url ?? 'https://images.unsplash.com/photo-1541252260730-0412e3e2104e?q=80&w=1974&auto=format&fit=crop' }}" 
             alt="{{ $project->name }}" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex items-end">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pb-12">
                <div class="mb-4">
                    <span class="px-4 py-1 rounded-full text-xs font-black uppercase tracking-widest bg-foot-yellow text-foot-violet">
                        Projet {{ $project->status }}
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-black text-white leading-tight">
                    {{ $project->name }}
                </h1>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-12">
                <!-- Main Content -->
                <div class="md:w-2/3">
                    <div class="prose prose-lg prose-foot max-w-none text-gray-700 leading-relaxed">
                        {!! nl2br(e($project->description)) !!}
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div class="md:w-1/3">
                    <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 sticky top-8">
                        <h3 class="text-xl font-black text-gray-900 mb-6">Informations</h3>
                        
                        <div class="space-y-6">
                            @if($project->goal)
                                <div>
                                    <span class="text-xs font-black text-gray-400 uppercase tracking-widest block mb-1">Objectif</span>
                                    <p class="text-lg font-bold text-foot-violet">{{ $project->goal }}</p>
                                </div>
                            @endif
                            
                            <div>
                                <span class="text-xs font-black text-gray-400 uppercase tracking-widest block mb-1">Statut</span>
                                <p class="text-lg font-bold text-gray-900 capitalize">{{ $project->status }}</p>
                            </div>
                            
                            <div class="pt-6 border-t border-gray-100">
                                <a href="{{ route('contact.create') }}" class="w-full bg-foot-violet text-white text-center py-4 rounded-2xl font-black hover:bg-gray-900 transition block">
                                    Nous soutenir
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 pt-16 border-t border-gray-100">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center text-foot-violet font-black hover:underline group">
                    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Retour aux projets
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
