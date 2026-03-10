<x-app-layout>
    <x-slot:title>Espace Admin - Nassira FC</x-slot:title>

    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 to-gray-100 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-foot-violet/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-foot-yellow/10 rounded-full blur-3xl"></div>

        <div class="max-w-md w-full space-y-8 relative z-10">
            <!-- Logo/Header -->
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-foot-violet shadow-2xl mb-6 transform hover:rotate-6 transition-transform duration-500">
                    <span class="text-3xl font-black text-foot-yellow">N</span>
                </div>
                <h2 class="text-4xl font-black text-gray-900 tracking-tight">
                    Administration
                </h2>
                <p class="mt-3 text-gray-500 font-medium">
                    Accédez au tableau de bord de <span class="text-foot-violet font-bold">Nassira FC</span>
                </p>
            </div>

            <!-- Login Card -->
            <div class="bg-white/80 backdrop-blur-xl p-10 rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-white relative group overflow-hidden">
                <!-- Subtle top border glow -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-foot-violet/20 to-transparent"></div>

                @if ($errors->any())
                    <div class="mb-8 p-4 rounded-2xl bg-red-50 border border-red-100 text-red-600 text-sm animate-pulse flex items-start space-x-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Identifiants incorrects. Veuillez réessayer.</span>
                    </div>
                @endif

                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-1">
                        <label for="email" class="text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Email professionnel</label>
                        <div class="relative group">
                            <input id="email" name="email" type="email" required autocomplete="email"
                                class="block w-full px-5 py-4 bg-gray-50 border-2 border-transparent rounded-2xl text-gray-900 placeholder-gray-400 outline-none focus:bg-white focus:border-foot-violet focus:ring-4 focus:ring-foot-violet/10 transition-all duration-300"
                                placeholder="votre@email.com"
                                value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <div class="flex justify-between items-center ml-1">
                            <label for="password" class="text-xs font-black text-gray-400 uppercase tracking-widest">Mot de passe</label>
                            <a href="#" class="text-xs font-bold text-foot-violet hover:text-foot-yellow transition">Oublié ?</a>
                        </div>
                        <div class="relative group">
                            <input id="password" name="password" type="password" required autocomplete="current-password"
                                class="block w-full px-5 py-4 bg-gray-50 border-2 border-transparent rounded-2xl text-gray-900 placeholder-gray-400 outline-none focus:bg-white focus:border-foot-violet focus:ring-4 focus:ring-foot-violet/10 transition-all duration-300"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center space-x-3 ml-1">
                        <input id="remember_me" name="remember" type="checkbox" class="w-5 h-5 text-foot-violet border-gray-300 rounded-lg focus:ring-foot-violet transition cursor-pointer">
                        <label for="remember_me" class="text-sm font-medium text-gray-500 cursor-pointer select-none">Rester connecté</label>
                    </div>

                    <button type="submit" 
                        class="w-full relative group bg-foot-violet text-white py-5 rounded-2xl font-black text-lg overflow-hidden transition-all duration-300 hover:shadow-[0_10px_25px_rgba(75,30,133,0.3)] active:scale-[0.98]">
                        <span class="relative z-10 flex items-center justify-center">
                            Se connecter
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </span>
                        <!-- Glossy effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
                    </button>
                </form>
            </div>
            
            <p class="text-center text-gray-400 text-sm font-medium">
                &copy; {{ date('Y') }} Nassira Football Club
            </p>
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

