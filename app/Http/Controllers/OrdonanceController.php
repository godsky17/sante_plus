<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ordonance;

class OrdonanceController extends Controller
{
    // Lister toutes les ordonnances
    public function index()
    {
        $ordonances = Ordonance::getOrdonances();
        return view('ordonances.index', compact('ordonances'));
    }


    // Afficher une ordonnance en détail
    public function show($id)
    {
        $ordonance = Ordonance::findOrFail($id);
        return view('ordonances.show', compact('ordonance'));
    }

    // Enregistrer une nouvelle ordonnance (avec save)
    public function store(Request $request)
    {
        $request->validate([
            'id_medecin' => 'required|string',
            'id_patient' => 'required|string',
            'id_consultation' => 'required|string',
            'medicaments' => 'required|array',
            'instructions' => 'nullable|string',
        ]);

        $ordonance = new Ordonance();
        $ordonance->id_medecin = $request->id_medecin;
        $ordonance->id_patient = $request->id_patient;
        $ordonance->id_consultation = $request->id_consultation;
        $ordonance->medicaments = $request->medicaments;
        $ordonance->instructions = $request->instructions;
        $ordonance->date_edition = now();
        $ordonance->save();

        return redirect()->back()->with('success', 'Ordonnance créée avec succès.');
    }

    // Modifier une ordonnance (avec save)
    public function update(Request $request, $id)
    {
        $request->validate([
            'medicaments' => 'required|array',
            'instructions' => 'nullable|string',
        ]);

        $ordonance = Ordonance::findOrFail($id);
        $ordonance->medicaments = $request->medicaments;
        $ordonance->instructions = $request->instructions;
        $ordonance->save();

        return redirect()->back()->with('success', 'Ordonnance mise à jour avec succès.');
    }

    // Supprimer une ordonnance
    public function destroy($id)
    {
        $ordonance = Ordonance::findOrFail($id);
        $ordonance->delete();

        return redirect()->back()->with('success', 'Ordonnance supprimée avec succès.');
    }
}
