<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteRequest;

class QuoteRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email',
            'client_phone' => 'nullable|string',
            'event_date' => 'required|date|after:today',
            'event_location' => 'required|string',
            'guest_count' => 'required|integer|min:1',
            'details' => 'required|string',
        ]);

        QuoteRequest::create($validated);

        return back()->with('success', 'Votre demande de devis a été envoyée avec succès ! Nous vous contacterons rapidement.');
    }

    // Côté Admin : Lister les demandes
    public function index()
    {
        $quotes = QuoteRequest::latest()->paginate(10);
        return view('admin.quotes.index', compact('quotes'));
    }
    public function updateStatus(Request $request, QuoteRequest $quoteRequest)
    {
        $request->validate([
            'status' => 'required|in:nouveau,confirme,annule,termine'
        ]);

        $quoteRequest->update(['status' => $request->status]);

        return back()->with('success', 'Le statut du devis a été mis à jour.');
    }
}
