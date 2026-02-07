<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign; // Importa il Model corretto

class CampaignController extends Controller
{
    // 1. Mostra la tabella con tutte le campagne
    public function index()
    {
        $campaigns = Campaign::latest()->get();
        return view('admin.campaigns.index', compact('campaigns'));
    }

    // 2. Mostra il modulo per aggiungere una nuova campagna
    public function create()
    {
        return view('admin.campaigns.create');
    }

    // 3. Salva i dati nel database dopo l'invio del form
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'authorized_domain' => 'required|string|unique:campaigns,authorized_domain',
            'tag' => 'nullable|string',
            'privacy_policy_url' => 'required|url',
            'terms_conditions_url' => 'nullable|url',
            'status' => 'required|in:active,inactive',
        ]);

        Campaign::create($data);

        return redirect()->route('campaigns.index')->with('success', 'Dominio aggiunto correttamente!');
    }

    // 4. Mostra il modulo per modificare una campagna esistente
    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', compact('campaign'));
    }

    // 5. Aggiorna i dati nel database
    public function update(Request $request, Campaign $campaign)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'authorized_domain' => 'required|string|unique:campaigns,authorized_domain,' . $campaign->id,
            'tag' => 'nullable|string',
            'privacy_policy_url' => 'required|url',
            'terms_conditions_url' => 'nullable|url',
            'status' => 'required|in:active,inactive',
        ]);

        $campaign->update($data);

        return redirect()->route('campaigns.index')->with('success', 'Campagna aggiornata!');
    }

    // 6. Elimina una campagna
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('campaigns.index')->with('success', 'Campagna eliminata!');
    }
}