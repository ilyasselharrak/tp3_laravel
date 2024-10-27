<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function createAccount($clientId)
    {
        $client = Client::findOrFail($clientId);
        return view('createAccount', compact('client'));
    }

    public function storeAccount(Request $request, $clientId)
    {
        $validated = $request->validate([
            'rib' => 'required|string|max:255',
            'solde' => 'required|integer',
        ]);

        $validated['client_id'] = $clientId; 
        Compte::create($validated);

        return redirect()->route('client.index')->with('success', 'Compte bancaire ajouté avec succès');
    }
    public function compte()
    {
        $comptes = Compte::with('client')->get(); 
        return view('compte', compact('comptes'));
    }
public function edit($id)
{
    $compte = Compte::findOrFail($id);
    return view('edits', compact('compte'));
}

public function update(Request $request, $id)
{
    $compte = Compte::findOrFail($id);
    $request->validate([
        'rib' => 'required|string|max:20',
        'solde' => 'required|numeric',
    ]);

    $compte->update($request->only(['rib', 'solde']));
    return redirect()->route('details',['id' => $compte->client_id])->with('success', 'Compte mis à jour avec succès.');
}

public function destroy($id)
{
    $compte = Compte::findOrFail($id);
    $compte->delete();
    return redirect()->route('details',['id' => $compte->client_id])->with('success', 'Compte supprimé avec succès.');
}
}