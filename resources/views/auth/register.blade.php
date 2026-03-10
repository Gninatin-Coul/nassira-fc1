<x-app-layout>
    <x-slot:title>Créer un compte - Nassira FC</x-slot:title>

    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 to-gray-100 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-foot-violet/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-foot-yellow/10 rounded-full blur-3xl"></div>

        <div class="max-w-md w-full space-y-8 relative z-10">
            <!-- Header -->
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-foot-violet shadow-2xl mb-6 transform hover:-rotate-6 transition-transform duration-500">
                    <span class="text-3xl font-black text-foot-yellow">N</span>
                </div>
                <h2 class="text-4xl font-black text-gray-900 tracking-tight">
                    Inscription
                </h2>
                <p class="mt-3 text-gray-500 font-medium">
                    Créez un compte pour accéder à l'administration
                </p>
            </div>

            <!-- Register Card -->
            <div class="bg-white/80 backdrop-blur-xl p-10 rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-white relative group overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-foot-yellow/40 to-transparent"></div>

                @if ($errors->any())
                    <div class="mb-8 p-4 rounded-2xl bg-red-50 border border-red-100 text-red-600 text-sm italic space-y-1">
                        @foreach ($errors->all() as $error)
                            <p class="flex items-center"><span class="w-1 h-1 bg-red-400 rounded-full mr-2"></span>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form class="space-y-5" action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-1">
                        <label for="name" class="text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Nom Complet</label>
                        <input id="name" name="name" type="text" required
                            class="block w-full px-5 py-4 bg-gray-50 border-2 border-transparent rounded-2xl text-gray-900 placeholder-gray-400 outline-none focus:bg-white focus:border-foot-violet focus:ring-4 focus:ring-foot-violet/10 transition-all duration-300"
                            placeholder="Jean Dupont"
                            value="{{ old('name') }}">
                    </div>

                    <div class="space-y-1">
                        <label for="email" class="text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Adresse Email</label>
                        <input id="email" name="email" type="email" required
                            class="block w-full px-5 py-4 bg-gray-50 border-2 border-transparent rounded-2xl text-gray-900 placeholder-gray-400 outline-none focus:bg-white focus:border-foot-violet focus:ring-4 focus:ring-foot-violet/10 transition-all duration-300"
                            placeholder="jean@nassirafc.ci"
                            value="{{ old('email') }}">
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Mot de passe</label>
                        <input id="password" name="password" type="password" required
                            class="block w-full px-5 py-4 bg-gray-50 border-2 border-transparent rounded-2xl text-gray-900 placeholder-gray-400 outline-none focus:bg-white focus:border-foot-violet focus:ring-4 focus:ring-foot-violet/10 transition-all duration-300"
                            placeholder="••••••••">
                    </div>

                    <div class="space-y-1">
                        <label for="password_confirmation" class="text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Confirmer le mot de passe</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="block w-full px-5 py-4 bg-gray-50 border-2 border-transparent rounded-2xl text-gray-900 placeholder-gray-400 outline-none focus:bg-white focus:border-foot-violet focus:ring-4 focus:ring-foot-violet/10 transition-all duration-300"
                            placeholder="••••••••">
                    </div>

                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full relative group bg-foot-yellow text-foot-violet py-5 rounded-2xl font-black text-lg overflow-hidden transition-all duration-300 hover:shadow-[0_10px_25px_rgba(250,204,21,0.3)] active:scale-[0.98]">
                            <span class="relative z-10 flex items-center justify-center">
                                Créer mon compte
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-8 border-t border-gray-100 text-center">
                    <p class="text-sm text-gray-500">
                        Déjà un compte ? 
                        <a href="{{ route('login') }}" class="font-bold text-foot-violet hover:text-foot-yellow transition underline decoration-2 underline-offset-4">Connectez-vous</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes shimmer {
            100% { transform: translateX(100%); }
        }
        .animate-shimmer {
            animation: shimmer 1.5s infinite;
        }
    </style>
</x-app-layout>
