<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medecin;
use App\Models\Hopital;
use MongoDB\BSON\ObjectId;
use Illuminate\Support\Facades\Hash;


class MedecinController extends Controller{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs,email',
            'telephone' => 'required|string|max:20|unique:utilisateurs,telephone',
            'id_hopital' => 'required',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.max' => 'Le prénom ne doit pas dépasser 255 caractères.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'email.unique' => 'Cet email est déjà utilisé.'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $utilisateur = new Utilisateur();
            $utilisateur->nom = $request->nom;
            $utilisateur->prenom = $request->prenom;
            $utilisateur->email = $request->email;
            $utilisateur->telephone = $request->telephone;
            $utilisateur->statut = 'en attente';
            $utilisateur->save();

            // Récupérer l'hopital
            $hopital = Hopital::where('_id', new ObjectId($request->id_hopital))->first();

            if ($hopital) {
                $medecin = new Medecin();
                $medecin->id_hopital = $hopital->_id;
                $medecin->id_utilisateur = $utilisateur->_id;  // lier au user créé
                // Ajouter autres champs obligatoires ici si besoin
                $medecin->save();
            }

            Auth::login($utilisateur);
            if(auth()->user()){
                dd('Well');
            }
            return redirect()->route('medecin.remerciement');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'inscription. Veuillez réessayer.' . $e->getMessage());
        }
    }

    /**
     * Affiche la page de succes avec les remerciements après l'inscription du medecin
     */
    public function succes()
    {
        return view("auth.medecin.remerciement");
    }

    public function valider($id)
    {
        $medecin = User::where('_id', new ObjectId($id))
                              ->where('type_utilisateur', 'medecin')
                              ->first();

        if (!$medecin) {
            return redirect()->back()->with('error', 'Médecin non trouvé.');
        }

        $medecin->statut = 'valide';
        $medecin->save();

        return redirect()->back()->with('success', 'Médecin validé avec succès.');
    }

    // Rejeter un médecin (changer statut en 'rejete')
    public function rejeter($id)
    {
        $medecin = User::where('_id', new ObjectId($id))
                              ->where('type_utilisateur', 'medecin')
                              ->first();

        if (!$medecin) {
            return redirect()->back()->with('error', 'Médecin non trouvé.');
        }

        $medecin->statut = 'rejete';
        $medecin->save();

        return redirect()->back()->with('success', 'Médecin rejeté avec succès.');
    }

    


}
