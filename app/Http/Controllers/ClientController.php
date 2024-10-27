<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;


class ClientController extends Controller
{
   
    public function create()
    {
        return view('client');
    }

   
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prénom' => 'required|string|max:255',
        ]);

       
        Client::create($validated);

        return redirect()->route('client.index')->with('success', 'Client ajouté avec succès');
    }
    public function index()
    {
        $clients = Client::orderBy('nom')->get(); 
        return view('index', compact('clients'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prénom' => 'required|string|max:255',
        ]);

        $client = Client::findOrFail($id);
        $client->update($validated);

        return redirect()->route('client.index')->with('success', 'Client mis à jour avec succès');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('client.index')->with('success', 'Client supprimé avec succès');
    }
   
   
    
    public function showDetails($id)
    {
        $client = Client::with('comptes')->findOrFail($id); 
        return view('details', compact('client'));
    }
}

