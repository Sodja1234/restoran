<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Traiteur Congolais - Saveurs Authentiques</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    <div class="relative overflow-hidden before:absolute before:top-0 before:start-1/2 before:bg-[url('https://preline.co/assets/svg/examples/polygon-bg-element.svg')] before:bg-no-repeat before:bg-top before:bg-cover before:w-full before:h-full before:-z-[1] before:transform before:-translate-x-1/2">
      <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-10">
        <div class="mt-5 max-w-2xl text-center mx-auto">
          <h1 class="block font-bold text-gray-800 text-4xl md:text-5xl lg:text-6xl">
            Saveurs du <span class="text-indigo-600">Congo</span>
          </h1>
          <p class="mt-3 text-lg text-gray-600">Découvrez l'excellence de notre service traiteur pour tous vos événements.</p>
        </div>
      </div>
    </div>

    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        @foreach($categories as $category)
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b-2 border-indigo-500 inline-block">{{ $category->name }}</h2>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($category->dishes as $dish)
                        <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl">
                            <div class="h-52 flex flex-col justify-center items-center bg-gray-100 rounded-t-xl overflow-hidden">
                                @if($dish->image_path)
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out" src="{{ asset('storage/' . $dish->image_path) }}" alt="{{ $dish->name }}">
                                @else
                                    <span class="text-gray-400">Image bientôt disponible</span>
                                @endif
                            </div>
                            <div class="p-4 md:p-6">
                                <span class="block mb-1 text-xs font-semibold uppercase text-indigo-600">
                                    {{ $category->name }}
                                </span>
                                <h3 class="text-xl font-semibold text-gray-800">
                                    {{ $dish->name }}
                                </h3>
                                <p class="mt-3 text-gray-500 text-sm">
                                    {{ $dish->description }}
                                </p>
                            </div>
                            <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200">
                                <span class="py-3 px-4 inline-flex justify-center items-center flex-1 text-sm font-medium text-gray-800">
                                    {{ number_format($dish->price, 2) }} €
                                </span>
                                <a class="py-3 px-4 inline-flex justify-center items-center flex-1 text-sm font-semibold text-indigo-600 hover:bg-gray-50 rounded-br-xl" href="#">
                                    Réserver
                                </a>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://unpkg.com/preline@1.x/dist/preline.js"></script>
</body>
</html>
