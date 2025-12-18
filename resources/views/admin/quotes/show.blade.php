<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow rounded-xl">
                <h2 class="text-2xl font-bold mb-6">Détails de la demande de {{ $quoteRequest->client_name }}</h2>

                <div class="space-y-4">
                    <p><strong>Email :</strong> {{ $quoteRequest->client_email }}</p>
                    <p><strong>Événement prévu le :</strong> {{ \Carbon\Carbon::parse($quoteRequest->event_date)->format('d/m/Y') }}</p>
                    <p><strong>Lieu :</strong> {{ $quoteRequest->event_location }}</p>
                    <p><strong>Nombre de convives :</strong> {{ $quoteRequest->guest_count }}</p>
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="font-bold mb-2">Message / Besoins spécifiques :</p>
                        <p class="text-gray-700">{{ $quoteRequest->details }}</p>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('admin.quotes.index') }}" class="text-indigo-600 hover:underline">← Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
