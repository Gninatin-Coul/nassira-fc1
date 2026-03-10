<x-app-layout>
    <x-slot:title>
        Contact - Nassira FC
    </x-slot>

    <!-- Header Section -->
    <div class="bg-foot-violet text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-foot-yellow mb-4">Contactez-nous</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Des questions sur l'adhésion, nos programmes ou un partenariat ? Écrivez-nous.
            </p>
        </div>
    </div>

    <!-- Contact Content -->
    <div class="py-16 bg-gray-50 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <!-- Contact Info -->
            <div>
                <h2 class="text-3xl font-black text-gray-900 mb-8">Informations de contact</h2>
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-2xl bg-white shadow-md flex items-center justify-center text-foot-violet shrink-0 border border-gray-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-lg font-bold text-gray-900">Adresse du Centre</h3>
                            <p class="text-gray-600">Complexe Sportif Nassira, Abidjan, Côte d'Ivoire</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded-r-lg" role="alert">
                        <p class="font-bold">Succès !</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Nom Complet</label>
                            <input type="text" name="name" id="name" required 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-foot-violet focus:border-foot-violet outline-none transition @error('name') border-red-500 @enderror"
                                   placeholder="Votre nom">
                            @error('name')<span class="text-xs text-red-500 mt-1">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" id="email" required 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-foot-violet focus:border-foot-violet outline-none transition @error('email') border-red-500 @enderror"
                                   placeholder="votre@email.com">
                            @error('email')<span class="text-xs text-red-500 mt-1">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-bold text-gray-700 mb-2">Objet</label>
                        <input type="text" name="subject" id="subject" required 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-foot-violet focus:border-foot-violet outline-none transition @error('subject') border-red-500 @enderror"
                               placeholder="Sujet de votre message">
                        @error('subject')<span class="text-xs text-red-500 mt-1">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-8">
                        <label for="message" class="block text-sm font-bold text-gray-700 mb-2">Message</label>
                        <textarea name="message" id="message" rows="5" required 
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-foot-violet focus:border-foot-violet outline-none transition @error('message') border-red-500 @enderror"
                                  placeholder="Écrivez ici..."></textarea>
                        @error('message')<span class="text-xs text-red-500 mt-1">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" 
                            class="w-full bg-foot-violet text-white font-bold py-4 px-6 rounded-xl hover:bg-gray-900 shadow-lg hover:shadow-xl transition-all duration-300">
                        Envoyer le message
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
