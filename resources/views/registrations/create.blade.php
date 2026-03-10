<x-app-layout>
    <x-slot:title>Rejoindre Nassira FC</x-slot>

    <!-- Hero Header -->
    <div class="bg-foot-violet text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-black text-foot-yellow mb-6 italic">REJOIGNEZ <span class="text-white">L'ÉLITE</span></h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto font-medium">
                Inscrivez votre enfant pour les prochaines détections et donnez-lui une chance d'intégrer notre académie de formation.
            </p>
        </div>
    </div>

    <!-- Registration Form Section -->
    <div class="py-16 bg-gray-50 flex justify-center">
        <div class="max-w-4xl w-full px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-gray-100 flex flex-col md:flex-row shadow-foot-violet/10">
                
                <!-- Info Sidebar (on desktop) -->
                <div class="md:w-1/3 bg-foot-violet p-10 text-white flex flex-col justify-between relative overflow-hidden">
                    <div class="relative z-10">
                        <h2 class="text-2xl font-bold mb-6">Processus de détection</h2>
                        <ul class="space-y-6">
                            <li class="flex items-start">
                                <span class="w-8 h-8 rounded-full bg-foot-yellow text-foot-violet flex items-center justify-center font-black shrink-0 mr-4">1</span>
                                <p class="text-sm font-medium">Remplissez le formulaire de pré-inscription en ligne.</p>
                            </li>
                            <li class="flex items-start">
                                <span class="w-8 h-8 rounded-full bg-foot-yellow text-foot-violet flex items-center justify-center font-black shrink-0 mr-4">2</span>
                                <p class="text-sm font-medium">Attendez la confirmation par email ou téléphone.</p>
                            </li>
                            <li class="flex items-start">
                                <span class="w-8 h-8 rounded-full bg-foot-yellow text-foot-violet flex items-center justify-center font-black shrink-0 mr-4">3</span>
                                <p class="text-sm font-medium">Présentez-vous aux tests physiques et techniques.</p>
                            </li>
                        </ul>
                    </div>
                    <!-- Decorative element -->
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-3xl"></div>
                </div>

                <!-- Form Area -->
                <div class="md:w-2/3 p-10 lg:p-14">
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-6 mb-8 rounded-r-2xl animate-bounce" role="alert">
                            <p class="font-bold text-lg">Bravo !</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('registrations.store') }}" method="POST" class="space-y-8">
                        @csrf
                        
                        <!-- Child Section -->
                        <div>
                            <h3 class="text-sm font-black uppercase tracking-widest text-foot-violet mb-6 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Informations de l'enfant
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="child_name" class="block text-xs font-bold text-gray-500 uppercase tracking-tighter mb-2 ml-1">Nom Complet de l'enfant</label>
                                    <input type="text" name="child_name" id="child_name" required value="{{ old('child_name') }}"
                                        class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-4 focus:ring-foot-violet/10 focus:border-foot-violet outline-none transition duration-300 font-medium @error('child_name') border-red-500 @enderror"
                                        placeholder="Ex: Kouassi Jean">
                                    @error('child_name') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="child_birth_date" class="block text-xs font-bold text-gray-500 uppercase tracking-tighter mb-2 ml-1">Date de naissance</label>
                                    <input type="date" name="child_birth_date" id="child_birth_date" required value="{{ old('child_birth_date') }}"
                                        class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-4 focus:ring-foot-violet/10 focus:border-foot-violet outline-none transition duration-300 font-medium @error('child_birth_date') border-red-500 @enderror">
                                    @error('child_birth_date') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        <!-- Parent Section -->
                        <div>
                            <h3 class="text-sm font-black uppercase tracking-widest text-foot-yellow mb-6 flex items-center drop-shadow-sm">
                                <svg class="w-5 h-5 mr-2 text-foot-violet" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                Coordonnées des parents
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label for="parent_name" class="block text-xs font-bold text-gray-500 uppercase tracking-tighter mb-2 ml-1">Nom du tuteur légal</label>
                                    <input type="text" name="parent_name" id="parent_name" required value="{{ old('parent_name') }}"
                                        class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-4 focus:ring-foot-violet/10 focus:border-foot-violet outline-none transition duration-300 font-medium @error('parent_name') border-red-500 @enderror"
                                        placeholder="Monsieur ou Madame ...">
                                    @error('parent_name') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-tighter mb-2 ml-1">Email de contact</label>
                                    <input type="email" name="email" id="email" required value="{{ old('email') }}"
                                        class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-4 focus:ring-foot-violet/10 focus:border-foot-violet outline-none transition duration-300 font-medium @error('email') border-red-500 @enderror"
                                        placeholder="exemple@email.ci">
                                    @error('email') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="phone" class="block text-xs font-bold text-gray-500 uppercase tracking-tighter mb-2 ml-1">Téléphone</label>
                                    <input type="tel" name="phone" id="phone" required value="{{ old('phone') }}"
                                        class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-4 focus:ring-foot-violet/10 focus:border-foot-violet outline-none transition duration-300 font-medium @error('phone') border-red-500 @enderror"
                                        placeholder="+225 ...">
                                    @error('phone') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" 
                            class="w-full py-5 bg-foot-violet text-white font-black text-lg rounded-2xl hover:bg-gray-900 transition-all duration-500 shadow-xl shadow-foot-violet/20 transform hover:-translate-y-1 active:scale-95">
                            SOUMETTRE LA DEMANDE
                        </button>

                        <p class="text-[10px] text-gray-400 text-center uppercase font-bold tracking-widest">
                            En soumettant, vous acceptez d'être recontacté pour les prochaines étapes.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
