<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une Catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf {{-- Obligatoire pour la sécurité dans Laravel --}}

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium mb-2">Nom de la catégorie</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                   class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-indigo-500 focus:ring-indigo-500" 
                                   placeholder="Ex: Entrées, Plats de résistance..." required>
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="sort_order" class="block text-sm font-medium mb-2">Ordre d'affichage (0 par défaut)</label>
                            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" 
                                   class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-x-2">
                        <a href="{{ route('categories.index') }}" class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50">
                            Annuler
                        </a>
                        <button type="submit" class="py-2 px-3 inline-flex items-center text-sm font-semibold rounded-lg border border-transparent bg-indigo-600 text-white hover:bg-indigo-700">
                            Enregistrer
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>