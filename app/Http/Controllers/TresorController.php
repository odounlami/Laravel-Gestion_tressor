<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\Categorie;
use App\Models\Oeuvre;
use Illuminate\Http\Request;

class TresorController extends Controller
{
    public function tresorTable()
    {
        // Récupérer toutes les oeuvres avec leurs artistes associés
        $oeuvres = Oeuvre::with('artiste')->get();

        // Retourner la vue avec les données récupérées
        return view('index', [
            'oeuvres' => $oeuvres,
        ]);
    }

    public function create(){
        $oeuvres = Oeuvre::with('artiste')->get();
        $categories = Categorie::all();
        $artistes = Artiste::all();
        return view('create', [
                'oeuvre' => $oeuvres,
                'artistes' => $artistes,
                'categories' => $categories,
        ]); 
    }

        
        public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required','unique:Oeuvre',
            'description' => 'required',
            'annee' => 'required|integer',
            'categorie_id' => 'required',
            'artiste_id' => 'nullable', // La clé étrangère peut être nulle ou faire référence à un artiste existant
        ]);

        $oeuvre = new Oeuvre();
        $oeuvre->nom = $validated['nom'];
        $oeuvre->description = $validated['description'];
        $oeuvre->annee = $validated['annee'];
        $oeuvre->categorie_id = $validated['categorie_id'];
        $oeuvre->artiste_id = $validated['artiste_id'] ?? null; // Attribuer NULL si aucun artiste n'est sélectionné

        $oeuvre->save();

        return redirect()->route('tresor.table')->with('status', "L'œuvre a été enregistrée avec succès !");
    }

    public function edit(Oeuvre $oeuvre)
    {
        $categories = Categorie::all();
        $artistes = Artiste::all();

        return view('edit', [
            'oeuvre' => $oeuvre,
            'categories' => $categories,
            'artistes' => $artistes,
        ]);
    }

    public function modifier(Request $request, Oeuvre $oeuvre)
    {
        $validated = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'annee' => 'required|integer',
            'categorie_id' => 'required',
            'artiste_id' => 'nullable',
        ]);

        $oeuvre->update([
            'nom' => $validated['nom'],
            'description' => $validated['description'],
            'annee' => $validated['annee'],
            'categorie_id' => $validated['categorie_id'],
            'artiste_id' => $validated['artiste_id'],
        ]);

        return redirect()->route('tresor.table')->with('success', 'Oeuvre modifiée avec succès');
    }
    
    public function supprimer($id)
    {
        $oeuvre = Oeuvre::findOrFail($id);
        $oeuvre->delete();

        return redirect()->route('tresor.table')->with('success', 'Oeuvre supprimée avec succès');
    }
}
