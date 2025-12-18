<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nos Plats</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg overflow-x-auto">
                <div class="mb-4 flex justify-end">
                    <a href="{{ route('dishes.create') }}" class="py-2 px-3 bg-indigo-600 text rounded-lg text-sm">Ajouter un Plat</a>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catégorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($dishes as $dish)
                        <tr>
                            <td class="px-6 py-4">
                                @if($dish->image_path)
                                    <img src="{{ asset('storage/' . $dish->image_path) }}" alt="{{ $dish->name }}" class="h-12 w-12 object-cover rounded-lg">
                                @else
                                    <div class="h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center text-xs text-gray-400">N/A</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $dish->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $dish->category->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ number_format($dish->price, 2) }} €</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ number_format($dish->price, 2) }} €</td>
                            <td class="px-6 py-4 text-right text-sm">
                                <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" onsubmit="return confirm('Supprimer ce plat ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
