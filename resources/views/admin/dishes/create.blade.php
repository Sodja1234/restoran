<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ajouter un nouveau plat</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">

                <form action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Catégorie</label>
                            <select name="category_id" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm" required>
                                <option value="">Choisir une catégorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Nom du plat (ex: Poulet à la Moambe)</label>
                            <input type="text" name="name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Prix (FCFA ou $)</label>
                            <input type="number" step="0.01" name="price" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Photo du plat</label>
                            <input type="file" name="image" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Description</label>
                            <textarea name="description" rows="3" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm" required></textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-x-2">
                        <button type="submit" class="py-2 px-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Enregistrer le plat</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
