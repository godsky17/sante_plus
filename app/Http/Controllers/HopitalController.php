<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Hopital;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;


class HopitalController extends Controller
{
    public function dashboard()
    {
        return view("admin.hopital.index");
    }

    public function medecinsEnAttente()
    {
        $medecins = User::where('type_utilisateur', 'medecin')
                        ->where('statut', 'en attente')
                        ->get();

        return view('admin.hopital.medecins', ['medecins' => $medecins]);
    }

    public function validerMedecin($id)
    {
        $medecin = User::find($id);

        if (!$medecin || $medecin->type_utilisateur !== 'medecin') {
            return back()->with('error', 'Médecin introuvable.');
        }

        $medecin->statut = 'valide';
        $medecin->save();

        return back()->with('success', 'Médecin validé avec succès.');
    }

    public function rejeterMedecin($id)
    {
        $medecin = User::find($id);

        if (!$medecin || $medecin->type_utilisateur !== 'medecin') {
            return back()->with('error', 'Médecin introuvable.');
        }

        $medecin->statut = 'rejete';
        $medecin->save();

        return back()->with('success', 'Médecin rejeté avec succès.');
    }

    public function afficherServices()
    {
        $services = Service::all();
        return view('admin.hopital.service', compact('services'));
    }

    public function storeServices(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:services,nom',
            'description' => 'nullable|string|max:1000',
        ]);

        try {
            Service::create([
                'nom' => $request->nom,
                'description' => $request->description,
            ]);

            return redirect()->route('hopital.services')->with('success', 'Service ajouté avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'ajout : ' . $e->getMessage())->withInput();
        }
    }

    public function updateServices(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255|unique:services,nom,' . $service->_id,
            'description' => 'nullable|string|max:1000',
        ]);

        try {
            $service->update([
                'nom' => $request->nom,
                'description' => $request->description,
            ]);

            return redirect()->route('hopital.services')->with('success', 'Service modifié avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la mise à jour : ' . $e->getMessage())->withInput();
        }
    }
}
